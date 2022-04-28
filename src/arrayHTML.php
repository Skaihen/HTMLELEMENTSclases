<?php
    namespace DAW\HTMLElements;

    require "vendor/autoload.php";

    function createHtmlElements($tagName, $attributes = [], $content = "", $isEmpty = true){
        $arrayEtiqueta = [
            "tagname" => $tagName,
            "attributes" => $attributes,
            "content" => $content,
            "isEmpty" => $isEmpty
        ];
        return $arrayEtiqueta;
    }

    function attributesToString($arrayEtiqueta){
        $stringattributes = "";
        foreach ($arrayEtiqueta["attributes"] as $clave => $valor) {
            $stringattributes .= $clave . " = " . '"' . $valor . '" ';
        }
        return rtrim($stringattributes);
    }

    function createHTMLElementsExample()
    {
        $br = [
            "tagname" => "br",
            "attributes" => [],
            "content" => "",
            "isEmpty" => true
        ];
        $p = [
            "tagname" => "p",
            "attributes" => [
                "id" => "ParrafoIntroduccion",
                "class" => "Normal"
            ],
            "content" => "Prueba",
            "isEmpty" => false
        ];
        $div = [
            "tagname" => "div",
            "attributes" => [
                "id" => "Container",
                "class" => "Centrado rojo",
                "style" => "position: absolute"
            ],
            "content" => "<br><p>Esto es un ejemplo</p>",
            "isEmpty" => false
        ];
        return [
            "br" => $br,
            "p" => $p,
            "div" => $div
        ];
    }

    function toHTML($htmlelement){
        $attributes = attributesToString($htmlelement["attributes"]);
        $code = "<".$htmlelement["tagname"]." ".$attributes.">";
        if (!$htmlelement["isEmpty"]) {
            $code .= $htmlelement["content"]."</".$htmlelement["tagname"].">";
        }
        return $code;
    }
?>
