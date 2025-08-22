<?php

class Bob
{
    public function respondTo($message = '')
    {
        $message = trim($message);

        if ($this->isSilent($message)) {
            return 'Fine. Be that way!';
        }

        if ($this->isForcefulQuestion($message)) {
            return "Calm down, I know what I'm doing!";
        }

        if ($this->isQuestion($message)) {
            return 'Sure.';
        }

        if ($this->isYelling($message)) {
            return 'Whoa, chill out!';
        }

        return 'Whatever.';
    }

    protected function isSilent($message)
    {
        $message = preg_replace("/(^\s+)|(\s+$)/us", "", $message);

        return $message === '';
    }

    protected function isQuestion($message)
    {
        return $this->endsWith('?', $message) and !$this->isForcefulQuestion($message);
    }

    protected function isForcefulQuestion($message)
    {
        return $this->isUppercase($message) and $this->endsWith('?', $message);
    }

    protected function isYelling($message)
    {
        if ($this->isUppercase($message) and !$this->isQuestion($message)) {
            return true;
        }

        if ($this->endsWith('!', $message) and $this->isUppercase($message)) {
            return true;
        }

        return false;
    }

    protected function isUppercase($message)
    {
        // Only alpha characters can be uppercase.
        $message = preg_replace('/[^a-zA-ZäöüÄÖÜ]/u', ' ', $message);
        $message = trim($message);
        $message = $this->convertCharacters($message);

        if ($message === '') {
            return false;
        }

        return strtoupper($message) === $message;
    }

    protected function endsWith($suffix, $message)
    {
        return $suffix === substr($message, -1);
    }

    protected function convertCharacters($message)
    {
        $conversions = [
          'ä' => 'a',
          'ö' => 'o',
          'ü' => 'u',
          'Ä' => 'A',
          'Ö' => 'O',
          'Ü' => 'U',
        ];

        foreach ($conversions as $character => $conversion) {
            $message = str_replace($character, $conversion, $message);
        }

        return $message;
    }
}
