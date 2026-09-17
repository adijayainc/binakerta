<?php
// Define the path to your repository
$repo_path = '/home/kmmozxnb/public_html/binakerta';

// Execute the git pull command
exec("cd {$repo_path} && git pull origin main 2>&1", $output, $return_var);

// Log the result for easy troubleshooting
file_put_contents('deploy.log', implode("\n", $output) . "\nReturn code: " . $return_var, FILE_APPEND);

if ($return_var === 0) {
    echo "Deployment Successful!";
} else {
    header('HTTP/1.1 500 Internal Server Error');
    echo "Deployment Failed. Check deploy.log for details.";
}
?>
