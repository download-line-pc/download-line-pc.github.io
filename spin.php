<?PHP
class Spintax
{   
    public function seed(mixed $seed)
    {
        mt_srand(crc32($seed));
    }

    public function process(string $text)
    {
        return preg_replace_callback(
            '/\{(((?>[^\{\}]+)|(?R))*?)\}/x',
            function ($match) {
                $text = $this->process($match[1]);
                $parts = explode('|', $text);

                return $parts[mt_rand(0, count($parts) - 1)];
            },
            $text
        );
    }
 
    public function spin(string $text)
    {
        $pattern = '/{([^{}]+)}/';
        while (preg_match($pattern, $text)) {
            $text = preg_replace_callback($pattern, function ($matches) {
                $options = explode('|', $matches[1]);

                return $options[ random_int(0, count($options) - 1) ];
            }, $text);
        }

        return $text;
    }
}


//$spintax = new Spintax();
//$string = '{Hello|Howdy|Hola} to you, {Mr.|Mrs.|Ms.} {Smith|Williams|Davis}!';
//echo $spintax->process($string);


//echo $spintax->process('{Hello|Howdy|Hola} to you, {Mr.|Mrs.|Ms.} {{Jason|Malina|Sara}|Williams|Davis}');


?>