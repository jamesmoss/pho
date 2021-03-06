<?php

namespace pho\Expectation\Matcher;

class PatternMatcher extends AbstractMatcher implements MatcherInterface
{
    private $pattern;

    private $subject;

    /**
     * Creates a new PatternMatcher for matching a string against a regular
     * expression.
     *
     * @param mixed $pattern The pattern to match
     */
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Tries to match the given string with the expected pattern. Returns
     * true if it matches, false otherwise.
     *
     * @param  mixed   $subject The string to test
     * @return boolean Whether or not the string matches the expect pattern
     */
    public function match($subject)
    {
        $this->subject = $subject;

        return (preg_match($this->pattern, $subject) > 0);
    }

    /**
     * Returns an error message indicating why the match would have failed given
     * the passed value. Returns the inverse of the message if $inverse is true.
     *
     * @param  boolean $inverse Whether or not to print the inverse message
     * @return string  The error message
     */
    public function getFailureMessage($inverse = false)
    {
        if (!$inverse) {
            return "Expected \"{$this->subject}\" to match {$this->pattern}";
        } else {
            return "Expected \"{$this->subject}\" not to match {$this->pattern}";
        }
    }
}
