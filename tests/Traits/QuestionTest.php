<?php

use Danzabar\CLI\CommandTester;

/**
 * The test case for question trait
 *
 * @package CLI
 * @subpackage Tests
 * @author Dan Cox
 */
class QuestionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * The tester
	 *
	 * @var Object
	 */
	protected $CT;

	
	/**
	 * Setup the test environment for commands
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function setUp()
	{
		$this->CT = new CommandTester();	
	}

	/**
	 * Test asking question a returning an answer
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function test_askQuestion()
	{
		$this->CT->setInput("answer \n");
		$this->CT->execute('Fake:ask');

		$this->assertContains('answer', $this->CT->getOutput());
	}

	/**
	 * A bit more complicated testing a question that expects two sets of input.
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function test_advQuestion()
	{
		$this->CT->setInput("yes\nAnswer\n");
		$this->CT->execute('Fake:advAsk');

		$this->assertContains('Answer', $this->CT->getOutput());	
	}

	/**
	 * Test the choice question functionality
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function test_choiceQuestion()
	{
		$this->CT->setInput("two\n");
		$this->CT->execute('Fake:choice');
		
		$this->assertContains('You have selected two', $this->CT->getOutput());
	}

} // END class QuestionTest extends \PHPUnit_Framework_TestCase