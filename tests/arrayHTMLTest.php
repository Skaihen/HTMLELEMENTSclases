<?php
    use PHPUnit\Framework\TestCase;

    final class arrayHTMLTest extends TestCase{
        public function DP_test_createHtmlElements(){
            $inputs = DAW\HTMLElements\createHTMLElementsExample();
            return [
                "TEST BR" => [
                    $inputs["br"],
                    "br",
                    [],
                    "",
                    true
                ],
                "TEST P" => [
                    $inputs["p"],
                    "p",
                    [
                        "id" => "ParrafoIntroduccion",
                        "class" => "Normal"
                    ],
                    "Prueba",
                    false
                ],
                "TEST DIV" => [
                    $inputs["div"],
                    "div",
                    [
                        "id" => "Container",
                        "class" => "Centrado, rojo",
                        "style" => "position: absolute"
                    ],
                    "<br><p>Esto es un ejemplo</p>",
                    true
                ]
            ];
        }
        /**
        * @dataProvider DP_test_createHtmlElements
        */
        public function test_createHtmlElements($esperado, $tagName, $attributes, $content, $isEmpty){
            $htmlElement = \DAW\HTMLElements\createHtmlElements($tagName, $attributes, $content, $isEmpty);
            $this->assertEquals($esperado, $htmlElement);
            return $htmlElement;
        }

        public function DP_testToHTML(){
            return [
                "TEST BR" => ["<br>"]
            ];
        }
        /**
        * @depends test_createHtmlElements
        * @dataProvider DP_testToHTML
        */
        public function testToHTML($esperado, $htmlElement){
            $this->assertEquals($esperado, DAW\HTMLElements\toHTML($htmlElement));
        }

        public function DP_test_attributesToString(){
            $inputs = DAW\HTMLElements\createHTMLElementsExample();
            return [
                "TEST BR" => [
                    '',
                    $inputs["br"]
                ],
                "TEST P" => [
                    'id = "ParrafoIntroduccion" class = "Normal"',
                    $inputs["p"]
                ],
                "TEST DIV" => [
                    'id = "Container" class = "Centrado rojo" style = "position: absolute"',
                    $inputs["div"]
                ]
            ];
        }
        /**
        * @dataProvider DP_test_attributesToString
        */
        public function test_attributesToString($esperado, $resultado){
            $this->assertEquals($esperado, \DAW\HTMLElements\attributesToString($resultado));
        }
    }
?>