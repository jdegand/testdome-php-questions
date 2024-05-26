<?php

class Thesaurus {
    private $thesaurus;

    public function __construct(array $thesaurus) {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms(string $word): string {
    $newArray = array(
        'word' => $word,
        'synonyms' => []
    );

    if (array_key_exists($word, $this->thesaurus)) {
        foreach ($this->thesaurus[$word] as $synonym) {
            $newArray['synonyms'][] = $synonym;
        }
    }

    return json_encode($newArray); // have to return a string
}
}

$thesaurus = new Thesaurus([
    "buy" => ["purchase"],
    "big" => ["great", "large"]
]);

echo $thesaurus->getSynonyms("big") . "\n";
echo $thesaurus->getSynonyms("agelast");