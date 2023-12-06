<?php

function checkVotingEligibility($age) {
    $votingAge = 18;

    if ($age >= $votingAge) {
        return "Eligible to vote";
    } else {
        return "Not eligible to vote";
    }
}

// Example: You can replace this value with the actual age of the candidate
$candidateAge = 20;

// Check and display the eligibility
$candidateEligibility = checkVotingEligibility($candidateAge);
echo "Candidate is " . $candidateEligibility;

?>
