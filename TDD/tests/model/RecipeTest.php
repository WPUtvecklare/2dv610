<?php

use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    protected $amount;
    protected $ingredient;
    protected $measurement;
    protected $instruction;
    protected $instructionsCollection;
    protected $sut;

    public function setUp(): void
    {
        $this->sut = new Recipe("My new recipe");

        $this->ingredient = $this->getMockBuilder("Ingredient")
            ->setConstructorArgs(["flour"])
            ->setMethods(["getName", "getAmount", "getMeasurement"])
            ->getMock();

        $this->ingredient->method("getName")
            ->willReturn("flour");

        $this->ingredient->method("getAmount")
            ->willReturn(2.3);

        $this->ingredient->method("getMeasurement")
            ->willReturn("dl");

        $this->instruction = $this->getMockBuilder("Instruction")
            ->setConstructorArgs(["Cook fish"])
            ->setMethods(["getInstruction", "isCompleted"])
            ->getMock();

        $this->instruction->method("getInstruction")
            ->willReturn("Cook fish");
        $this->instruction->method("isCompleted")
            ->willReturn(false);

        $this->instructionsCollection = $this->getMockBuilder("InstructionsCollection")
            ->disableOriginalClone()
            ->setMethods(["getInstructions"])
            ->getMock();

        $this->instructionsCollection->method("getInstructions")
            ->willReturn([$this->instruction]);
    }

    /** @test */
    public function shouldSetRecipeTitle()
    {
        $actual = $this->sut->getTitle();

        $expected = "My new recipe";

        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function shouldSetFirstTitleCharacterToUppercase()
    {
        $input = "my new title";
        $sut = new Recipe($input);
        $actual = $sut->getTitle();

        $expected = "My new title";

        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function shouldAddIngredient()
    {
        $this->sut->addIngredient($this->ingredient);

        $actual = $this->sut->getIngredients();

        $this->assertInstanceOf(Ingredient::class, $actual[0]);
    }

    /** @test */
    public function shouldSetNumberOfServings()
    {
        $input = 4;
        $this->sut->setServings($input);

        $actual = $this->sut->getServings();
        $expected = 4;

        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function shouldSetTagName()
    {
        $input = "Lunch";
        $this->sut->setTagName($input);

        $actual = $this->sut->getTagName();
        $expected = "Lunch";

        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function shouldNotBeAbleToSetIncorrectTag()
    {
        $this->expectException(Exception::class);
        $input = "Fika";
        $this->sut->setTagName($input);
    }
}
