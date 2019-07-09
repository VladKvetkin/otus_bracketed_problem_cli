<?php

require_once './vendor/autoload.php';

echo "BRACKETED PROBLEM RESOLVER" . PHP_EOL . PHP_EOL;
echo "Please, type path to file with bracketed problem: ";

$stdin = fopen ('php://stdin','r');
$filePath = trim(fgets($stdin));

if (!file_exists($filePath)) {
    exit('File not found!');
}

$bracketedString = file_get_contents($filePath);
$bracketedProblemResolver = new BracketedProblemResolver($bracketedString);

try {
    $resolverStatus = $bracketedProblemResolver->resolve() ? 'true' : 'false';
    echo "Bracketed problem resolver status: " . $resolverStatus;
} catch (InvalidArgumentException $e) {
    exit($e->getMessage());
}