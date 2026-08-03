<?php
/*
Plugin Name: Ithena - Custom Functions
Description: A plugin to house all the custom functions without modifying the theme's functions.php file.
Version: 1.0
Author: Ithena
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//wp-form//

function add_custom_js_to_form() {
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            // Create a new div element for the LinkedIn Profile field
            var linkedInFieldGroup = document.createElement("div");
            linkedInFieldGroup.classList.add("awsm-job-form-group");

            // Create a label for the LinkedIn Profile field
            var linkedInLabel = document.createElement("label");
            linkedInLabel.setAttribute("for", "awsm-applicant-linkedin");
            linkedInLabel.innerHTML = "LinkedIn Profile";

            // Create the input field
            var linkedInInput = document.createElement("input");
            linkedInInput.setAttribute("type", "url");
            linkedInInput.setAttribute("name", "awsm_applicant_linkedin");
            linkedInInput.setAttribute("id", "awsm-applicant-linkedin");
            linkedInInput.classList.add("awsm-job-form-field", "awsm-job-form-control");

            // Append the label and input field to the div
            linkedInFieldGroup.appendChild(linkedInLabel);
            linkedInFieldGroup.appendChild(linkedInInput);

            // Insert the new field after the phone field
            //var phoneFieldGroup = document.getElementById("awsm-applicant-phone").closest(".awsm-job-form-group");
            //phoneFieldGroup.parentNode.insertBefore(linkedInFieldGroup, phoneFieldGroup.nextSibling);
        });
    </script>';
}
add_action('wp_footer', 'add_custom_js_to_form');


function save_linkedin_profile_field($application_id) {
    if (isset($_POST['awsm_applicant_linkedin'])) {
        update_post_meta($application_id, 'awsm_applicant_linkedin', sanitize_text_field($_POST['awsm_applicant_linkedin']));
    }
}
add_action('awsm_jobs_application_submitted', 'save_linkedin_profile_field');


function include_linkedin_profile_in_email($message, $application_data) {
    // Get LinkedIn profile URL from post meta
    $linkedin_profile = get_post_meta($application_data['application_id'], 'awsm_applicant_linkedin', true);
    if ($linkedin_profile) {
        // Append LinkedIn profile URL to the email message
        $message .= "\nLinkedIn Profile: " . esc_url($linkedin_profile);
    }
    return $message;
}
add_filter('awsm_jobs_application_email_message', 'include_linkedin_profile_in_email', 10, 2);


function custom_form_submission_handler() {
    if (isset($_POST['action']) && $_POST['action'] == 'awsm_applicant_form_submission') {
        // Collect form data
        $linkedin_profile = isset($_POST['awsm_applicant_linkedin']) ? sanitize_text_field($_POST['awsm_applicant_linkedin']) : 'N/A';
        $full_name = sanitize_text_field($_POST['awsm_applicant_name']);
        $email = sanitize_email($_POST['awsm_applicant_email']);
        $phone = sanitize_text_field($_POST['awsm_applicant_phone']);
        $cover_letter = sanitize_textarea_field($_POST['awsm_applicant_letter']);

        // Prepare email content
        $email_body = "Full Name: " . $full_name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Phone: " . $phone . "\n";
        $email_body .= "LinkedIn Profile: " . $linkedin_profile . "\n";
        $email_body .= "Cover Letter: " . $cover_letter . "\n";

        // Set email parameters
        $to = 'your-email@example.com'; // Replace with your email address
        $subject = 'New Form Submission';
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Send the email
        wp_mail($to, $subject, $email_body, $headers);
    }
}
add_action('init', 'custom_form_submission_handler');



//API for IPM//

function my_custom_application_details_callback($application_data) {
    // Access the application details
    $application_details = get_application_details_by_application_id($application_data);
    error_log('application_details: ' . print_r($application_details, true));

    $applicant_name = isset($application_details['applicant_name']) ? $application_details['applicant_name'] : '';
    $applicant_email = isset($application_details['applicant_email']) ? $application_details['applicant_email'] : '';
    $applicant_phone = isset($application_details['applicant_phone']) ? $application_details['applicant_phone'] : ''; // Retrieve phone number
    $job_id = isset($application_details['job_id']) ? $application_details['job_id'] : '';
    $resume_url = isset($application_details['resume_url']) ? $application_details['resume_url'] : '';
    $cover_letter = isset($application_details['cover_letter']) ? $application_details['cover_letter'] : ''; 
    $job_location = isset($application_details['job_location']) ? $application_details['job_location'] : ''; 
    $job_type = isset($application_details['job_type']) ? $application_details['job_type'] : '';

	 $main_job_id = get_post_meta($application_data, 'awsm_job_id', true);
	 $ipm_work_packages = get_post_meta($main_job_id, 'ipm_work_packages', true);
	   error_log('OpenProject API $ipm_work_packages: ' . $ipm_work_packages);
	
    // Prepare data for the OpenProject task
    $project_id = '98'; // Replace with your actual project ID
    $api_token = 'YXBpa2V5OjE0MTFmMGI4NmQxYmZlZTk4NmViZDZkMzAzZGI3MGZiNTNiMmQ4YzY0YTkzM2JmN2U2NDgyYTIwYTJhN2YyMjQ=';   // Replace with your actual OpenProject API token
    $openproject_url = 'https://ipm.ithena.io/api/v3/work_packages';

    // Prepare the task details
    $task_data = array(
        'subject' => 'Job Application for ' . $job_id . ' from ' . $applicant_name,
        'description' => array(
            'format' => 'markdown',
            'raw' => "Job ID: $job_id \nJob Location: $job_location \nJob Type: $job_type \nApplicant Name: $applicant_name\nApplicant Email: $applicant_email\nApplicant Phone: $applicant_phone\nResume: $resume_url \nCover Letter: $cover_letter"
        ),
        'type' => array(
            'href' => "/api/v3/types/9"
        ),
        'project' => array(
            'href' => "/api/v3/projects/$project_id"
        )
        // Add more fields as necessary (e.g., status, priority)
    );

    // Convert the task data to JSON
    $json_data = json_encode($task_data);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $openproject_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic ' . $api_token,
        'Content-Type: application/json'
    ));

    error_log('OpenProject API request: ' . $json_data);
    // Execute the cURL request
    $response = curl_exec($ch);

    $responseData = json_decode($response, true);

    if (isset($responseData['id'])) {
        $workPackageId = $responseData['id']; // Return the work package ID
        // attachFile($openproject_url, $api_token, $workPackageId, $resume_url);
       // linkTasks('https://ipm.ithena.io', $api_token, $ipm_work_packages, $workPackageId);
    }
    
    // Check for cURL errors
    if (curl_errno($ch)) {
       // error_log('cURL error: ' . curl_error($ch));
    } else {
       // error_log('OpenProject API response: ' . $response);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        //error_log("Response Headers:\n" . $header);
        //error_log("Response Body:\n" . $body);
    }

    // Close cURL session
    curl_close($ch);
}

function get_application_details_by_application_id($application_id) {
    // Ensure that the application_id is valid
    if (!$application_id) {
        return null;
    }

    // Get the application post object
    $application_post = get_post($application_id);
    $attachment_id = get_post_meta($application_id, 'awsm_attachment_id', true);
    $resume_url = wp_get_attachment_url($attachment_id);

    // Retrieve job and applicant details
    $job_id = get_post_meta($application_id, 'awsm_job_id', true);
    $applicant_phone = get_post_meta($application_id, 'awsm_applicant_phone', true); // Add this line to get phone number

    if ($job_id) {
        $job_title = get_the_title($job_id);
        $job_location = get_post_meta($job_id, 'awsm_job_location', true);
        $job_type = get_post_meta($job_id, 'awsm_job_type', true);
    }

    // Get job location and type
    // ... (rest of your existing code for location and type)

    // Check if the post exists and is of the correct post type
    if ($application_post && $application_post->post_type === 'awsm_job_application') {
        // Collecting application details
        $application_details = array(
            'applicant_name' => get_post_meta($application_id, 'awsm_applicant_name', true),
            'applicant_email' => get_post_meta($application_id, 'awsm_applicant_email', true),
            'applicant_phone' => $applicant_phone, // Add phone number here
            'resume_url' => $resume_url,
            'cover_letter' => get_post_meta($application_id, 'awsm_applicant_letter', true),
            'submission_date' => get_the_date('Y-m-d H:i:s', $application_id),
            'job_id' => $job_title,
            'job_location' => $job_location,
            'job_type' => $job_type,
        );

        return $application_details;
    } else {
        // No valid application found for the given application_id
        return null;
    }
}

add_action('awsm_job_application_submitted', 'my_custom_application_details_callback', 10, 1);



//job opening on ipm//

function my_custom_job_published_callback($post_id) {
    // Get the post type
    $post_type = get_post_type($post_id);

    // Check if the post type is 'awsm_job_openings'
    if ($post_type !== 'awsm_job_openings') {
        return;
    }

    // Check if the job has already been processed
    if (get_post_meta($post_id, 'ipm_work_packages', true)) {
        return;
    }

    // Prepare data for the IPM (OpenProject) task
    $project_id = '98'; // Replace with your actual project ID
    $api_token = 'YXBpa2V5OjE0MTFmMGI4NmQxYmZlZTk4NmViZDZkMzAzZGI3MGZiNTNiMmQ4YzY0YTkzM2JmN2U2NDgyYTIwYTJhN2YyMjQ='; // Replace with your actual OpenProject API token
    $openproject_url = 'https://ipm.ithena.io/api/v3/work_packages';

    // Get the job details
    $job_title = get_the_title($post_id);
    $job_location = get_post_meta($post_id, 'awsm_job_location', true);
    $job_type = get_post_meta($post_id, 'awsm_job_type', true);

    // Prepare the task details
    $task_data = array(
        'subject' => 'New Job Posted: ' . $job_title,
        'description' => array(
            'format' => 'markdown',
            'raw' => "Job Title: $job_title\nJob Location: $job_location\nJob Type: $job_type"
        ),
        'type' => array(
            'href' => "/api/v3/types/8"
        ),
        'project' => array(
            'href' => "/api/v3/projects/$project_id"
        )
    );

    // Convert the task data to JSON
    $json_data = json_encode($task_data);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $openproject_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic ' . $api_token,
        'Content-Type: application/json'
    ));

    // Execute the cURL request
    $response = curl_exec($ch);
    $json = json_decode($response, true);
    $ipm_workpackage_id = isset($json['id']) ? $json['id'] : null;

    // Check for cURL errors
    if (curl_errno($ch)) {
        error_log('cURL error: ' . curl_error($ch));
    } else {
        error_log('OpenProject API response: ' . $response);
    }

    // Close cURL session
    curl_close($ch);

    // If the request was successful, update meta for work id
    if ($ipm_workpackage_id) {
        add_post_meta($post_id, 'ipm_work_packages', $ipm_workpackage_id, true);
    }
}

// Add the action hook for job publishing
add_action('publish_awsm_job_openings', 'my_custom_job_published_callback');


//cURL function//
function attachFile($openProjectUrl, $apiKey, $workPackageId, $externalFileUrl) {
    $fileContent = file_get_contents($externalFileUrl);
    $fileName = basename($externalFileUrl);

    $url = $openProjectUrl . "/api/v3/work_packages/$workPackageId/attachments";

    $boundary = uniqid();
    $delimiter = '-------------' . $boundary;

    $headers = [
        'Authorization: Basic '.$apiKey,
        "Content-Type: multipart/form-data; boundary=$delimiter"
    ];

    $postData = "--$delimiter\r\n"
        . "Content-Disposition: form-data; name=\"file\"; filename=\"$fileName\"\r\n"
        . "Content-Type: application/pdf\r\n\r\n"
        . $fileContent . "\r\n"
        . "--$delimiter--\r\n";

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true
    ];
	  error_log('****file upload url: ' .$url);
   error_log('****file upload header: ' . print_r($headers));
	  error_log('****file upload post data: ' .$postData);
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);
     error_log('cURL file upload : ' . curl_error($ch));
	error_log('cURL file upload : ' .$response);
    if ($response) {
        echo "File attached successfully!";
    } else {
        echo "Error attaching file: " . $response;
    }
}


//cover letter hint//
function customize_cover_letter_field() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Target the cover letter textarea by its ID
            var coverLetterField = document.getElementById('awsm-cover-letter');
            if (coverLetterField) {
                // Add the placeholder attribute
                coverLetterField.placeholder = 'Briefly highlight your technical skills, relevant skill set, and key projects you have worked on.';
                
                // Remove the required attribute
                coverLetterField.removeAttribute('required');

                // Handle form submission
                coverLetterField.form.addEventListener('submit', function(event) {
                    console.log('Form Submitted');
                    console.log('Cover Letter Value:', coverLetterField.value);
                    // Check and handle empty field
                    if (coverLetterField.value.trim() === '') {
                        coverLetterField.value = ' '; // Set to a default value
                        console.log('Cover Letter was empty, set to default value.');
                    }
                });
            }

            // Remove any error labels associated with the cover letter field
            var labels = document.querySelectorAll('label[for="awsm-cover-letter"] .awsm-job-form-error');
            labels.forEach(function(label) {
                label.remove();
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'customize_cover_letter_field');


function make_cover_letter_optional($errors, $form_data) {
    if (isset($form_data['cover_letter'])) {
        // Check if cover letter is empty
        if (empty($form_data['cover_letter'])) {
            // Override error if cover letter is not required
            unset($errors['cover_letter']);
        }
    }
    return $errors;
}

function linkTasks($apiUrl, $apiKey, $task1Id, $task2Id, $relationType = 'follows') {
    // Define the API endpoint for creating relations
    $url = $apiUrl . "/api/v3/relations";

    // Create the payload data
    $data = [
        "type" => $relationType,
        "from" => [
            "href" => "/api/v3/work_packages/" . $task1Id
        ],
        "to" => [
            "href" => "/api/v3/work_packages/" . $task2Id
        ]
    ];

	error_log('linkTasks header : '.print_r($data,true));
    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
       'Authorization: Basic ' . $apiKey,
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute cURL request
    $response = curl_exec($ch);
	error_log('linkTasks response : '.print_r($response,true));
    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Decode the JSON response
        $responseDecoded = json_decode($response, true);
        
        // Check the HTTP response status
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode == 201) {
            echo "Relation created successfully: " . print_r($responseDecoded, true);
        } else {
            echo "Failed to create relation. HTTP Status Code: $httpCode. Response: " . print_r($responseDecoded, true);
        }
    }

    // Close cURL session
    curl_close($ch);
}

add_filter('wp_job_openings_validate_form', 'make_cover_letter_optional', 10, 2);


// Dynamic shortcode//
add_shortcode('wp_job_specs_shortcode', 'call_back_test_sc');
function call_back_test_sc() {
    // Get the current job post ID
    $job_id = get_the_ID();
		
	/*************************/	
		$data              = array();
		$default_emp_types = array(
			'FULL_TIME'  => __( 'Full Time', 'wp-job-openings' ),
			'PART_TIME'  => __( 'Part Time', 'wp-job-openings' ),
			'CONTRACTOR' => __( 'Freelance', 'wp-job-openings' ),
			'TEMPORARY'  => __( 'Temporary', 'wp-job-openings' ),
			'INTERN'     => __( 'Intern', 'wp-job-openings' ),
			'VOLUNTEER'  => __( 'Volunteer', 'wp-job-openings' ),
			'PER_DIEM'   => __( 'Per Diem', 'wp-job-openings' ),
			'OTHER'      => __( 'Other', 'wp-job-openings' ),
		);
		$default_emp_types = array_flip( array_map( 'sanitize_title', $default_emp_types ) );
		if ( taxonomy_exists( 'job-type' ) ) {
			$emp_types = get_the_terms(  $job_id, 'job-type' );
			if ( ! empty( $emp_types ) ) {
				$data['employmentType'] = array();
				foreach ( $emp_types as $emp_type ) {
					$slug = $emp_type->slug;
					if ( array_key_exists( $slug, $default_emp_types ) ) {
						$data['employmentType'][] = $default_emp_types[ $slug ];
					}
				}
				if ( count( $data['employmentType'] ) === 1 ) {
					$data['employmentType'] = $data['employmentType'][0];
				}
			}
		}
	
		$job_type = $data['employmentType'];
	
	//job location
	
				if ( taxonomy_exists( 'job-location' ) ) {
			$locations = get_the_terms( $post->ID, 'job-location' );
			if ( ! empty( $locations ) ) {
				$data['jobLocation'] = array();
				foreach ( $locations as $location ) {
					$data['jobLocation'][] = array(
						'@type'   => 'Place',
						'address' => $location->name,
					);
				}
			}
		}
	
	// Initialize an array to store addresses
	$addresses = array();
	
	
	// Loop through the data array to extract the address
	foreach ( $data['jobLocation'] as $place) {
		if (isset($place['address'])) {
			$addresses[] = $place['address'];
		}
	}

	// Join the addresses into a single string, separated by commas
	$job_location = implode(", ", $addresses);
	
	
	//experience
	
	// Initialize an array to store experiences
	$experiences = array();

	// Get the terms associated with the 'experience' taxonomy
	$experience_terms = get_the_terms($job_id, 'experience');

	// Check if there are any experience terms
	if ( ! empty( $experience_terms ) && ! is_wp_error( $experience_terms ) ) {
		// Loop through the experience terms to extract the 'name'
		foreach ( $experience_terms as $term ) {
			if ( isset( $term->name ) ) {
				$experiences[] = $term->name;
			}
		}
	}

	// Join the experiences into a single string, separated by commas
	$job_experience = implode(", ", $experiences);
	
		
	/*************************/
	
    // Retrieve custom fields or meta data related to the job
    $location = $job_location;
    $experience = $job_experience;
    $job_link = get_permalink(); // Link to the current job post
    $job_title = 'Apply for this position'; // Default button text

    // Fallback values if custom fields are empty
    if (!$location) $location = 'Location not specified';
    if (!$experience) $experience = 'Experience not specified';

    ob_start(); // Start output buffering
    ?>
    <div class="job-overview">
        <div class="overview">
            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                <span><?php echo esc_html($location); ?></span>
            </div>
            <div class="experience">
                <i class="fas fa-briefcase"></i>
                <span><?php echo esc_html($experience); ?></span>
            </div>
            <div class="buttons">
                <a href="#awsm-application-form">
                    <button class="apply-btn"><?php echo esc_html($job_title); ?></button>
                </a>
            </div>
        </div>
        <div class="share-job">
            <div class="share-links">
                <a href="mailto:?subject=<?php echo urlencode('Job details for ' . get_the_title($job_id)); ?>&body=<?php echo urlencode($job_link); ?>" target="_blank" rel="noopener">
                    <i class="fas fa-share-alt"></i> Share Job
                </a>
            </div>
        </div>
    </div>

    <style>
        /* The same CSS as before */
		
			
		#awsm-application-form{
			offset: auto;
		}
		
        .job-overview {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1b1b1b;
            border: 1px solid #1f90ff;
            padding: 20px;
            border-radius: 5px;
            color: white;
            font-family: Arial, sans-serif;
            flex-wrap: wrap;
            margin-top: 1.5em;
            margin-bottom: 1.5em;
        }

        .overview {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            flex: 1;
            min-width: 200px;
        }

        .location, .experience {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .location i, .experience i {
            font-size: 16px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .apply-btn {
            background-color: #1f90ff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            white-space: nowrap;
        }

        .share-job {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
            color: blue;
        }

        .share-job i {
            font-size: 24px;
            color: #1f90ff;
        }

        .share-job span {
            font-size: 14px;
            color: #1f90ff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .job-overview {
                flex-direction: column;
                align-items: flex-start;
            }

            .overview {
                width: 100%;
                margin-bottom: 10px;
            }

            .buttons {
                width: 100%;
                flex-direction: column;
            }

            .apply-btn, .download-btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .share-job {
                align-self: flex-end;
            }
        }
    </style>
    <?php
    return ob_get_clean(); // Return the buffered output
}


// cover letter//
add_action('before_awsm_job_details', 'custom_insert_application', 10, 1);

function custom_insert_application() {
    global $awsm_response;

    if (isset($awsm_response['error'])) {
        // Check if the error related to the applicant letter exists
        $awsm_response['error'] = array_filter($awsm_response['error'], function($error) {
            return $error !== esc_html__('Cover Letter cannot be empty.', 'wp-job-openings');
        });
    }
}

// Optionally, you could also hook into the form submission process to ensure the check is bypassed completely:
add_action('awsm_job_application_submitting', 'custom_bypass_letter_check', 10, 1);

function custom_bypass_letter_check() {
    global $awsm_response;

    // Remove error message related to the applicant letter being empty
    if (isset($awsm_response['error'])) {
        $awsm_response['error'] = array_filter($awsm_response['error'], function($error) {
            return $error !== esc_html__('Cover Letter cannot be empty.', 'wp-job-openings');
        });
    }
}

function load_scripts() {
    //wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/custom-scripts.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );


/* Formidable form hook for attachment*/
add_filter('frm_notification_attachment', 'add_email_attachment', 10, 3);
function add_email_attachment($attachments, $form, $args) {
    // Check if the form ID matches the form you want to add attachments to
    if ($form->id == 90 || $form->id == 111) { // replace 90 with your form ID
        $attachments[] = WP_CONTENT_DIR . '/uploads/2025/08/iGEMBA-BROCHURES-FINAL.pdf'; // Path to your first file
        $attachments[] = WP_CONTENT_DIR . '/uploads/2025/08/iSERV-brochure-digital.pdf'; // Path to your second file
    }
    return $attachments;
}


//Filter page code//
/**
 * SAFE TAXONOMY HANDLING
 */
function safe_implode($value) {
    if (empty($value)) return '';
    return is_array($value) ? implode(', ', $value) : (string) $value;
}

//custom post layout
function my_custom_post_layout($layout, $post_id, $filter_id, $increment_post, $arrOptions) {

    // Get the first attached image URL
    $media = get_attached_media('image', $post_id);
    $image_url = !empty($media) ? wp_get_attachment_image_src(array_values($media)[0]->ID, 'custom_image_size')[0] : '';

    // Fallback to featured image
    if (empty($image_url)) {
        $image_url = get_the_post_thumbnail_url($post_id, 'custom_image_size');
    }

    $image_class = 'your-default-image-class';

    // Image layout
    $layout  = '<div class="' . esc_attr($image_class) . '">';
    $layout .= '<a href="' . esc_url(get_permalink($post_id)) . '" target="_blank">';
    $layout .= '<img src="' . esc_url(get_the_post_thumbnail_url($post_id, 'full')) . '" alt="' . esc_attr(get_the_title($post_id)) . '">';
    $layout .= '</a>';
    $layout .= '</div>';

    $industryvertical = safe_implode(get_taxonomy_names($post_id, "industryvertical"));
    $technology       = safe_implode(get_taxonomy_names($post_id, "technology"));
    $services         = safe_implode(get_taxonomy_names($post_id, "services"));
    $customers        = safe_implode(get_taxonomy_names($post_id, "customers"));

    // Tags layout
    $layout .= '<div class="tags">';

    if ($industryvertical) {
        $layout .= '<h3 class="iv" style="display:inline-block;border:1px solid #00488B;margin-bottom:10px;padding:5px;">' . esc_html($industryvertical) . '</h3>';
    }

    if ($technology) {
        $layout .= '<h3 class="tech" style="display:inline-block;border:1px solid #00488B;margin-left:10px;padding:5px;">' . esc_html($technology) . '</h3>';
    }

    if ($services) {
        $layout .= '<h3 class="service" style="display:inline-block;border:1px solid #00488B;margin-left:10px;padding:5px;">' . esc_html($services) . '</h3>';
    }

    if ($customers) {
        $layout .= '<h3 class="customers" style="display:inline-block;border:1px solid #00488B;margin-left:10px;padding:5px;">' . esc_html($customers) . '</h3>';
    }

    $layout .= '</div>';

    // Title + excerpt
    $layout .= '<h2 class="cs-title">' . esc_html(get_the_title($post_id)) . '</h2>';
    $layout .= '<p class="cs-content">' . esc_html(wp_trim_words(get_the_excerpt($post_id), 13)) . '</p>';

    // CTA
    $layout .= '<a style="background-color:#0082c8;padding:10px;text-decoration:none;color:white;font-size:13px;border-radius:2px;display:inline;" class="your-button-class" href="' . esc_url(get_permalink($post_id)) . '" target="_blank">Read More ➤</a>';

    return $layout;
}

function get_taxonomy_names($post_id, $taxonomy) {
    // Get the terms for the specified taxonomy associated with the post
    $terms = get_the_terms($post_id, $taxonomy);

    if ($terms && !is_wp_error($terms)) {
        $term_names = array(); // Initialize an empty array to store term names

        foreach ($terms as $term) {
            $term_names[] = $term->name; // Add each term name to the array
        }
        return $term_names;
    }
}

add_filter('ymc_post_custom_layout_52646_1', 'my_custom_post_layout', 10, 5);
add_image_size('custom_image_size', 300, 200, true);


// case study form pdf downloading code//
// Allow duplicate submissions globally
add_filter('frm_allow_duplicate', '__return_true');

// Redirect after form submission
add_action('frm_after_create_entry', 'custom_redirect_after_form_submission', 30, 2);
function custom_redirect_after_form_submission($entry_id, $form_id) {
    error_log("Form submission detected. Form ID: " . $form_id);

    if ($form_id == 98) {
        $url_segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
        $last_segment = end($url_segments);

        error_log("Last URL Segment: " . $last_segment);

        $case_study = get_page_by_path($last_segment, OBJECT, 'case-study-test');
        $case_study_pdf = get_post_meta($case_study->ID, 'case_study_pdf', true);

        if (!empty($case_study_pdf)) {
            $redirect_url = get_permalink($case_study->ID) . '?download_pdf=true';
            wp_redirect($redirect_url);
            exit;
        }
    }

    reset_user_context();
}

// Handle PDF download
add_action('wp_footer', 'handle_pdf_download');
function handle_pdf_download() {
    if (isset($_GET['download_pdf']) && $_GET['download_pdf'] === 'true') {
        $download_url = get_post_meta(get_queried_object_id(), 'case_study_pdf', true);

        if ($download_url) {
            echo "<script>
                const link = document.createElement('a');
                link.href = '" . esc_url($download_url) . "';
                link.download = '';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            </script>";
        }
    }
}

// Reset user context to prevent tracking of submissions
function reset_user_context() {
    // Clear Formidable Forms tracking cookies
    foreach ($_COOKIE as $key => $value) {
        if (strpos($key, 'frm_form') !== false) {
            setcookie($key, '', time() - 3600, '/'); // Expire Formidable Forms cookies
        }
    }

    // Clear transient data related to Formidable Forms entries
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_frm_entry_%'");
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_frm_entry_%'");

    // Clear PHP session variables (if any)
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }

    error_log("User context reset.");
}

// Ensure Formidable Forms doesn't cache entry submissions
add_filter('frm_after_duplicate_entry', '__return_false');
add_filter('frm_save_entry', function ($entry) {
    unset($entry['duplicate_check']);
    return $entry;
});

function ithena_dynamic_year_shortcode() {
    return 'Copyright © ' . date('Y') . ' ITHENA. All Rights Reserved.';
}
add_shortcode('ithena_year', 'ithena_dynamic_year_shortcode');

add_filter('ymc_post_custom_layout_79644_1', 'blogs_customlayout', 10, 5);
function blogs_customlayout($layout, $post_id, $filter_id, $increment_post, $arrOptions) {
    
	// Get the first attached image URL with custom size
    $media = get_attached_media('image', $post_id);
    $image_url = !empty($media) ? wp_get_attachment_image_src(array_values($media)[0]->ID, 'custom_image_size')[0] : '';

    // Get the featured image if available
    if (empty($image_url)) {
        $image_url = get_the_post_thumbnail_url($post_id, 'custom_image_size');
    }

    // Define a default value for $image_class
    $image_class = 'blog-feature-image'; // Set a class or use logic to define it
    $image_id = 'blog-img-'.$post_id; // Set a class or use logic to define it

    $blog_industryvertical = safe_implode(get_taxonomy_names($post_id, "industryvertical"));
    $blog_technology       = safe_implode(get_taxonomy_names($post_id, "technology"));
    $blog_solution         = safe_implode(get_taxonomy_names($post_id, "services"));
    $blog_customers        = safe_implode(get_taxonomy_names($post_id, "customers"));

	
	// Build the layout with custom width, height, and object-fit: contain
	$layout  = '<div class="' . esc_attr($image_class) . '" id="'.esc_attr($image_id).'">';
	$layout .= '<a href="' . get_permalink($post_id) . '" target="_blank">'; // Link to the post with target="_blank"
	$layout .= '<img class="blog-thumbnail" src="' . esc_url(get_the_post_thumbnail_url($post_id, 'full')) . '" alt="' . esc_attr(get_the_title($post_id)) . '">';
	$layout .= '</a>';
	$layout .= '</div>';

    // Add title and excerpt
    $layout .= '<h2 class="blog-title">' . get_the_title($post_id) . '</h2>';
    $layout .= '<p class="blog-content">' . wp_trim_words(get_the_excerpt($post_id), 13) . '</p>'; // Use get_the_excerpt instead of get_the_content

    // Add Read More button
    $button_class = 'blog-read-more'; // Define your button class
    $layout .= '<a class="' . esc_attr($button_class) . '" href="' . get_permalink($post_id) . '" target="_blank">Read The Blog ➤</a>';

    return $layout;
}