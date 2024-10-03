export default function handleError(error) {
    
    let message = 'An unexpected error occurred.';
    let validationErrors = {};

    if (error.response) {
        // Check if it's a Laravel validation error
        if (error.response.status === 422 && error.response.data.errors) {
            validationErrors = error.response.data.errors;
            message = 'There were validation errors.';
        } else {
            // Handle other types of errors
            message = error.response.data.message || `Error: ${error.response.status} ${error.response.statusText}`;
        }
    } else if (error.request) {
        message = 'No response received from the server. Please check your network connection.';
    } else {
        message = error.message;
    }

    console.log(message);

    return { message, validationErrors };
    }
