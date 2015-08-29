<?php
/**
 * The Carbon Pagination item class.
 * Corresponds to a particular item of the pagination.
 */
class Carbon_Pagination_Item {

	/**
	 * The pagination collection object this item belongs to.
	 * @var Carbon_Pagination_Collection
	 */
	protected $collection;

	/**
	 * The subitems collection.
	 * Contains the sub items that this item consists of.
	 * Can be false if this item is a standalone single item.
	 * @var Carbon_Pagination_Collection|bool
	 */
	protected $subitems_collection = false;

	/**
	 * Tokens that can be auto replaced in the HTML of an item.
	 *
	 * Tokens should be passed in the array in the following way:
	 * array( 'TOKENNAME' => 'tokenvalue' )
	 *
	 * Tokens should be used in the string in the following way:
	 * 'lorem {TOKENNAME} ipsum'
	 * 
	 * @var array
	 */
	protected $tokens = array();

	/**
	 * Constructor.
	 * Creates and configures a new pagination item.
	 *
	 * @access public
	 * @param Carbon_Pagination_Collection $collection Pagination collection object.
	 */
	public function __construct( Carbon_Pagination_Collection $collection ) {
		$this->set_collection( $collection );

		$this->init();
	}

	/**
	 * Retrieve the collection object.
	 *
	 * @access public
	 * @return Carbon_Pagination_Collection $collection The collection object.
	 */
	public function get_collection() {
		return $this->collection;
	}

	/**
	 * Modify the collection object.
	 *
	 * @access public
	 * @param Carbon_Pagination_Collection $collection The new collection object.
	 */
	public function set_collection( Carbon_Pagination_Collection $collection ) {
		$this->collection = $collection;
	}

	/**
	 * Retrieve the item subitems collection.
	 *
	 * @access public
	 * @return Carbon_Pagination_Collection $subitems_collection The item subitems collection.
	 */
	public function get_subitems_collection() {
		return $this->subitems_collection;
	}

	/**
	 * Modify the item subitems collection.
	 *
	 * @access public
	 * @param Carbon_Pagination_Collection $subitems_collection The new item subitems collection.
	 */
	public function set_subitems_collection( Carbon_Pagination_Collection $subitems_collection ) {
		$this->subitems_collection = $subitems_collection;
	}

	/**
	 * Retrieve the item HTML replaceable tokens.
	 *
	 * @access public
	 * @return array $tokens The item HTML replaceable tokens.
	 */
	public function get_tokens() {
		return $this->tokens;
	}

	/**
	 * Modify the item HTML replaceable tokens.
	 *
	 * @access public
	 * @param array $tokens The new item HTML replaceable tokens.
	 */
	public function set_tokens( $tokens ) {
		$this->tokens = $tokens;
	}

	/**
	 * Render the item.
	 *
	 * @codeCoverageIgnore
	 *
	 * @access public
	 * @return string $html The HTML of the item.
	 */
	public function render() {
		return '';
	}

	/**
	 * Initialize the item.
	 *
	 * @access public
	 */
	public function init() {}

	/**
	 * Setup the item before rendering.
	 *
	 * @access public
	 */
	public function setup() {}

}