<?php

class CarbonPaginationSetTotalPagesTest extends WP_UnitTestCase {

	public function setUp() {
		$paginationStub = $this->getMockForAbstractClass( 'Carbon_Pagination' );
		$this->pagination = $paginationStub;
	}

	public function tearDown() {
		unset( $this->pagination );
	}

	public function testNegative() {
		$this->pagination->set_total_pages( -5 );
		$this->assertSame( 1, $this->pagination->get_total_pages() );
	}

	public function testZero() {
		$this->pagination->set_total_pages( 0 );
		$this->assertSame( 1, $this->pagination->get_total_pages() );
	}

	public function testNonNumeric() {
		$this->pagination->set_total_pages( 'foo' );
		$this->assertSame( 1, $this->pagination->get_total_pages() );

		$this->pagination->set_total_pages( '' );
		$this->assertSame( 1, $this->pagination->get_total_pages() );
	}

	public function testStringNumber() {
		$this->pagination->set_total_pages( '10' );
		$this->assertSame( 10, $this->pagination->get_total_pages() );
	}

}