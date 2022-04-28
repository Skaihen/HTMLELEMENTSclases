<?php
use PHPUnit\Framework\TestCase;
use DAW\HTMLElementsClass\HTMLElement;

final class HTMLElementClassTest extends TestCase{
    public function DP_test_createHtmlElement(){
        return [
            "TEST P" => [
                '<p id="ParrafoIntroduccion" class="Normal">PruebaPrueba2</p>',
                "p",
                [
                    "id" => "ParrafoIntroduccion",
                    "class" => "Normal"
                ],
                "Prueba",
                false
            ],
            "TEST NESTED" => [
                '<div id="Container" class="Centrado rojo" style="position: absolute"><p>Esto es un ejemplo</p></div>',
                "div",
                [
                    "id" => "Container",
                    "class" => "Centrado rojo",
                    "style" => "position: absolute"
                ],
                [],
                false,
            ]
        ];
    }
    /**
    * @dataProvider DP_test_createHtmlElement
    */
    public function test_createHtmlElement($esperado, $tagName, $attributes, $content, $isEmpty){
        $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
        $this->assertEquals($esperado, $HTMLElement->getHTML());
    }


    public function DP_test_getTagName(){
        return [
            "TEST P" => [
                "p",
                "p",
                [
                    "id" => "ParrafoIntroduccion",
                    "class" => "Normal"
                ],
                "Prueba",
                false
            ]
        ];
    }
    /**
    * @dataProvider DP_test_getTagName
    */
    public function test_getTagName($esperado, $tagName, $attributes, $content, $isEmpty){
    $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
        $this->assertEquals($esperado, $HTMLElement->getTagName());
    }
    /**
    * @dataProvider DP_test_getTagName
    */
    public function test_isEmptyElement($esperado, $tagName, $attributes, $content, $isEmpty){
        $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
        $this->assertEquals($isEmpty, $HTMLElement->isEmptyElement());
    }

    public function DP_test_addContent(){
        return [
            "TEST P" => [
                ["Prueba", "Prueba2"],
                "p",
                [
                    "id" => "ParrafoIntroduccion",
                    "class" => "Normal"
                ],
                "Prueba",
                false
            ]
        ];
    }
    /**
    * @dataProvider DP_test_addContent
    */
    public function test_addContent($esperado, $tagName, $attributes, $content, $isEmpty){
        $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
        $HTMLElement->addContent("Prueba2");
        $this->assertEquals($esperado, $HTMLElement->getContent());

    }

    public function DP_test_addAttribute(){
        return [
            "TEST P" => [
                ["id" => "ParrafoIntroduccion", "class" => "Normal", "Test" => "Prueba"],
                "p",
                [
                    "id" => "ParrafoIntroduccion",
                    "class" => "Normal"
                ],
                "Prueba",
                false
            ]
        ];
    }
    /**
    * @dataProvider DP_test_addAttribute
    */
    public function test_addAttribute($esperado, $tagName, $attributes, $content, $isEmpty){
        $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
        $HTMLElement->addAttribute("Test", "Prueba");
        $this->assertEquals($esperado, $HTMLElement->getAttributes());
    }

    public function DP_test_removeAttribute(){
        return [
            "TEST P" => [
                ["id" => "ParrafoIntroduccion"],
                "p",
                [
                    "id" => "ParrafoIntroduccion",
                    "class" => "Normal"
                ],
                "Prueba",
                false
            ]
        ];
    }
    /**
    * @dataProvider DP_test_removeAttribute
    */
    public function test_removeAttribute($esperado, $tagName, $attributes, $content, $isEmpty){
        $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
        $HTMLElement->removeAttribute("class");
        $this->assertEquals($esperado, $HTMLElement->getAttributes());
    }

    public function DP_test_isSameTag(){
        return [
            "TEST P" => [
                "p",
                "p",
                [
                    "id" => "ParrafoIntroduccion",
                    "class" => "Normal"
                ],
                "Prueba",
                false
            ]
        ];
    }
    /**
    * @dataProvider DP_test_isSameTag
    */
    public function test_isSameTag($esperado, $tagName, $attributes, $content, $isEmpty){
    $HTMLElement = new HTMLElement($tagName, $attributes, $content, $isEmpty);
    $HTMLElement2 = new HTMLElement($esperado, $attributes, $content, $isEmpty);
        $this->assertTrue($HTMLElement->isSameTag($HTMLElement2));
    }
}
?>
