<?php

class displayProject {


    public function separateSentences($text, $wordsPerSentence) {
        // Explode the text into sentences
        $sentences = explode('.', $text);

        // Initialize variables
        $newParagraphs = array();
        $currentParagraph = '';

        // Loop through each sentence
        foreach ($sentences as $sentence) {
            // Trim whitespace from the sentence
            $sentence = trim($sentence);

            // If the sentence is not empty
            if (!empty($sentence)) {
                // Explode the sentence into words
                $words = explode(' ', $sentence);

                // Count the number of words in the sentence
                $wordCount = count($words);

                // If the number of words exceeds the limit, start a new paragraph
                if ($wordCount > $wordsPerSentence) {
                    // Add the current paragraph to the array
                    $newParagraphs[] = $currentParagraph;

                    // Start a new paragraph with the current sentence
                    $currentParagraph = '<p class="els-text-lg">' . $sentence . '.'.'</p>';
                } else {
                    // If the word count is within the limit, add the sentence to the current paragraph
                    $currentParagraph .= '<p class="els-text-lg">'. $sentence . '.'.'</p>';
                }
            }
        }

        // Add the last paragraph to the array
        if (!empty($currentParagraph)) {
            $newParagraphs[] = $currentParagraph;
        }

        // Return the new paragraphs as HTML
        return implode(' ', $newParagraphs);
    }
}
