Carbon Pagination
=================

### About

A handy WordPress library for building all kinds of paginations. 

Provides the theme and plugin developers an easy way to build and implement highly customizable paginations, specifically tailored to their needs. 

Can be used as a WordPress plugin as well.

- - -

Usage & Examples
----------------

#### Basic Usage

The following example is the most basic way to display a posts pagination (see **Configuration Options** for all types of pagination), using the default options:
	
	<?php carbon_pagination('posts'); ?>

If using Carbon Pagination as a plugin, it would be best to check if the function exists:
	
	<?php 
	if ( function_exists('carbon_pagination') ) {
		carbon_pagination('posts'); 
	}
	?>

The `carbon_pagination()` function is a wrapper around the main `Carbon_Pagination` class. Which means you can also do the above this way:

	<?php Carbon_Pagination::display('posts'); ?>

Of course, if using Carbon Pagination as a plugin, it would be best to check if the class exists:

	<?php 
	if ( class_exists('Carbon_Pagination') ) {
		Carbon_Pagination::display('posts');
	}
	?>

#### Specifying parameters

You can specify your preferred parameters as the second argument of `carbon_pagination()` and `Carbon_Pagination::display()`. Example:

	<?php 
	carbon_pagination('posts', array(
		'wrapper_before' => '<div class="paging">',
		'wrapper_after' => '</div>',
		'enable_first' => false,
		'enable_last' => false,
		'enable_numbers' => false,
		'number_limit' => 5,
	)); 
	?>

Below is an example, containing all possible settings that you can specify, along with their default values.

	<?php 
	carbon_pagination('posts', array(
		'wrapper_before' => '<div class="paging">',
		'wrapper_after' => '</div>',
		'pages' => array(),
		'current_page' => 1,
		'total_pages' => 1,
		'enable_prev' => true,
		'enable_next' => true,
		'enable_first' => false,
		'enable_last' => false,
		'enable_numbers' => false,
		'enable_current_page_text' => false,
		'number_limit' => 0,
		'large_page_number_limit' => 0,
		'large_page_number_interval' => 10,
		'numbers_wrapper_before' => '<ul>',
		'numbers_wrapper_after' => '</ul>',
		'prev_html' => '<a href="{URL}" class="paging-prev"></a>',
		'next_html' => '<a href="{URL}" class="paging-next"></a>',
		'first_html' => '<a href="{URL}" class="paging-first"></a>',
		'last_html' => '<a href="{URL}" class="paging-last"></a>',
		'number_html' => '<li><a href="{URL}">{PAGE_NUMBER}</a></li>',
		'limiter_html' => '<li class="paging-spacer">...</li>',
		'current_page_html' => '<span class="paging-label">Page {CURRENT_PAGE} of {TOTAL_PAGES}</span>',
	)); 
	?>

You can read more about each setting in the **Configuration Options** section.

#### Using and manipulating pagination as an object

In case you need to manipulate the pagination you can define the pagination as an object:

	$pagination = new Carbon_Pagination_Posts(array(
		'wrapper_before' => '<div class="paging">',
		'wrapper_after' => '</div>',
	));

Then you can use any of the methods, as documented in the **Class Reference**. Example:
	
	// whether the first link is enabled
	$first_link_enabled = $pagination->get_enable_first();

	// disable first page link
	$pagination->set_enable_first(false);

	// enable last page link
	$pagination->set_enable_last(true);

	// disable page number links
	$pagination->set_enable_numbers(false);

	// set the limit of page number links to 5
	$pagination->set_number_limit(5);

Finally, once you want to render your pagination, you can simply call:

	$pagination->render();

- - -

Configuration Options
---------------------

You can specify these configuration options by passing them as an associative array to the `$args` argument when calling `carbon_pagination()`, `Carbon_Pagination::display()`, or when creating a new instance of any pagination class (for a full list, please refer to the **Class Reference** section).

Within some of the configurations options (the ones that are HTML) you can use tokens. These tokens will be automatically replaced with dynamic content that comes from the pagination (for example page number, page link URL, total number of pages, etc). 

For examples on how to pass these configuration options, please refer to either the **Usage & Examples** section.

The available configuration options are:

#### wrapper_before

_(string). Default: **'&lt;div class="paging"&gt;'**_.

The HTML, displayed before the entire pagination.

#### wrapper_after

_(string). Default: **'&lt;/div&gt;'**_.

The HTML, displayed after the entire pagination.

#### pages

_(array). Optional. Default: **array()**_.

Can be used to contain IDs if you want to loop through particular IDs instead of consecutive page numbers. If not defined, falls back to an array of all pages from `1` to `$total_pages`.

#### current_page

_(int). Default: **1**_.

The current page number.

#### total_pages

_(int). Default: **1**_.

The total number of available pages. Not necessary if you have specified `pages`.

#### enable_prev

_(bool). Default: **true**_.

Whether the previous page link should be displayed.

#### enable_next

_(bool). Default: **true**_.

Whether the next page link should be displayed.

#### enable_first

_(bool). Default: **false**_.

Whether the first page link should be displayed.

#### enable_last

_(bool). Default: **false**_.

Whether the last page link should be displayed.

#### enable_numbers

_(bool). Default: **false**_.

Whether the page number links should be displayed.

#### enable\_current\_page\_text

_(bool). Default: **false**_.

Whether the current page text `Page X of Y` should be displayed.

#### number_limit

_(int). Default: **0**_.

The number of page number links that should be displayed. Using `0` means no limit (all page number links will be displayed).

#### large\_page\_number\_limit

_(int). Default: **0**_.

The number of larger page number links that should be displayed. Larger page numbers can be: `10`, `20`, `30`, etc. Using `0` means none (no larger page number links will be displayed).

#### large\_page\_number\_interval

_(int). Default: **10**_.

The interval between larger page number links. If set to `5`, larger page numbers will be `5`, `10`, `15`, `20`, etc.

#### numbers\_wrapper\_before

_(string). Default: **'&lt;ul&gt;'**_.

The wrapper before the page number links.

#### numbers\_wrapper\_after

_(string). Default: **'&lt;/ul&gt;'**_.

The wrapper after the page number links.

#### prev_html

_(string). Default: **'&lt;a href="{URL}" class="paging-prev"&gt;&lt;/a&gt;'**_.

The HTML of the previous page link. You can use the following tokens:

- **{URL}** - the link URL

#### next_html

_(string). Default: **'&lt;a href="{URL}" class="paging-next"&gt;&lt;/a&gt;'**_.

The HTML of the next page link. You can use the following tokens:

- **{URL}** - the link URL

#### first_html

_(string). Default: **'&lt;a href="{URL}" class="paging-first"&gt;&lt;/a&gt;'**_.

The HTML of the first page link. You can use the following tokens:

- **{URL}** - the link URL

#### last_html

_(string). Default: **'&lt;a href="{URL}" class="paging-last"&gt;&lt;/a&gt;'**_.

The HTML of the last page link. You can use the following tokens:

- **{URL}** - the link URL

#### number_html

_(string). Default: **'&lt;li&gt;&lt;a href="{URL}"&gt;{PAGE_NUMBER}&lt;/a&gt;&lt;/li&gt;'**_.

The HTML of the page number link. You can use the following tokens:

- **{URL}** - the link URL
- **{PAGE_NUMBER}** - the particular page number

#### limiter_html

_(string). Default: **'&lt;li class="paging-spacer"&gt;...&lt;/li&gt;'**_.

The HTML of limiter between page number links.

#### current\_page\_html

_(string). Default: **'&lt;span class="paging-label"&gt;Page {CURRENT_PAGE} of {TOTAL_PAGES}&lt;/span&gt;'**_.

The current page text HTML. You can use the following tokens:

- **{CURRENT_PAGE}** - the current page number
- **{TOTAL_PAGES}** - the total number of pages

- - -

Class Reference
---------------

### Carbon_Pagination

**@abstract**

The Carbon Pagination base class. Contains and manages all of the pagination settings. Abstract, can be extended by all specific pagination types.

#### $wrapper_before

**@access** _protected_

**@var** _(string). Default: **'&lt;div class="paging"&gt;'**_.

The HTML, displayed before the entire pagination.

#### $wrapper_after

**@access** _protected_

**@var** _(string). Default: **'&lt;/div&gt;'**_.

The HTML, displayed after the entire pagination.

#### $pages

**@access** _protected_

**@var** _(array). Optional. Default: **array()**_.

Can be used to contain IDs if you want to loop through particular IDs instead of consecutive page numbers. If not defined, falls back to an array of all pages from `1` to `$total_pages`.

#### $current_page

**@access** _protected_

**@var** _(int). Default: **1**_.

The current page number.

#### $total_pages

**@access** _protected_

**@var** _(int). Default: **1**_.

The total number of available pages. Not necessary if you have specified `pages`.

#### $enable_prev

**@access** _protected_

**@var** _(bool). Default: **true**_.

Whether the previous page link should be displayed.

#### $enable_next

**@access** _protected_

**@var** _(bool). Default: **true**_.

Whether the next page link should be displayed.

#### $enable_first

**@access** _protected_

**@var** _(bool). Default: **false**_.

Whether the first page link should be displayed.

#### $enable_last

**@access** _protected_

**@var** _(bool). Default: **false**_.

Whether the last page link should be displayed.

#### $enable_numbers

**@access** _protected_

**@var** _(bool). Default: **false**_.

Whether the page number links should be displayed.

#### $enable\_current\_page\_text

**@access** _protected_

**@var** _(bool). Default: **false**_.

Whether the current page text `Page X of Y` should be displayed.

#### $number_limit

**@access** _protected_

**@var** _(int). Default: **0**_.

The number of page number links that should be displayed. Using `0` means no limit (all page number links will be displayed).

#### $large\_page\_number\_limit

**@access** _protected_

**@var** _(int). Default: **0**_.

The number of larger page number links that should be displayed. Larger page numbers can be: `10`, `20`, `30`, etc. Using `0` means none (no larger page number links will be displayed).

#### $large\_page\_number\_interval

**@access** _protected_

**@var** _(int). Default: **10**_.

The interval between larger page number links. If set to `5`, larger page numbers will be `5`, `10`, `15`, `20`, etc.

#### $numbers\_wrapper\_before

**@access** _protected_

**@var** _(string). Default: **'&lt;ul&gt;'**_.

The wrapper before the page number links.

#### $numbers\_wrapper\_after

**@access** _protected_

**@var** _(string). Default: **'&lt;/ul&gt;'**_.

The wrapper after the page number links.

#### $prev_html

**@access** _protected_

**@var** _(string). Default: **'&lt;a href="{URL}" class="paging-prev"&gt;&lt;/a&gt;'**_.

The HTML of the previous page link. You can use the following tokens:

- **{URL}** - the link URL

#### $next_html

**@access** _protected_

**@var** _(string). Default: **'&lt;a href="{URL}" class="paging-next"&gt;&lt;/a&gt;'**_.

The HTML of the next page link. You can use the following tokens:

- **{URL}** - the link URL

#### $first_html

**@access** _protected_

**@var** _(string). Default: **'&lt;a href="{URL}" class="paging-first"&gt;&lt;/a&gt;'**_.

The HTML of the first page link. You can use the following tokens:

- **{URL}** - the link URL

#### $last_html

**@access** _protected_

**@var** _(string). Default: **'&lt;a href="{URL}" class="paging-last"&gt;&lt;/a&gt;'**_.

The HTML of the last page link. You can use the following tokens:

- **{URL}** - the link URL

#### $number_html

**@access** _protected_

**@var** _(string). Default: **'&lt;li&gt;&lt;a href="{URL}"&gt;{PAGE_NUMBER}&lt;/a&gt;&lt;/li&gt;'**_.

The HTML of the page number link. You can use the following tokens:

- **{URL}** - the link URL
- **{PAGE_NUMBER}** - the particular page number

#### $limiter_html

**@access** _protected_

**@var** _(string). Default: **'&lt;li class="paging-spacer"&gt;...&lt;/li&gt;'**_.

The HTML of limiter between page number links.

#### $current\_page\_html

**@access** _protected_

**@var** _(string). Default: **'&lt;span class="paging-label"&gt;Page {CURRENT_PAGE} of {TOTAL_PAGES}&lt;/span&gt;'**_.

The current page text HTML. You can use the following tokens:

- **{CURRENT_PAGE}** - the current page number
- **{TOTAL_PAGES}** - the total number of pages

#### __construct()

**@access** _public_

**@param** *(array) $args. Configuration options to modify the pagination settings.*

**@return** _Carbon_Pagination_

Constructor. Creates and configures a new pagination with the provided settings.

#### get_wrapper_before()

**@access** _public_

**@return** *(string) $wrapper_before. The pagination wrapper - before.*

Retrieve the pagination wrapper - before.

#### set_wrapper_before()

**@access** _public_

**@param** *(string) $wrapper_before. The new pagination wrapper - before.*

Modify the pagination wrapper - before.

#### get_wrapper_after()

**@access** _public_

**@return** *(string) $wrapper_after. The pagination wrapper - after.*

Retrieve the pagination wrapper - after.

#### set_wrapper_after()

**@access** _public_

**@param** *(string) $wrapper_after. The new pagination wrapper - after.*

Modify the pagination wrapper - after.

#### get_pages()

**@access** _public_

**@return** *(array) $pages. The pages array.*

Retrieve the pages array.

#### set_pages()

**@access** _public_

**@param** *(array) $pages. The new pages array.*

Modify the pages array.

#### get_current_page()

**@access** _public_

**@return** *(int) $current_page. The current page number.*

Retrieve the current page number.

#### set_current_page()

**@access** _public_

**@param** *(int) $current_page. The new current page number.*

Modify the current page number.

#### get_total_pages()

**@access** _public_

**@return** *(int) $total_pages. The total number of pages.*

Retrieve the total number of pages.

#### set_total_pages()

**@access** _public_

**@param** *(int) $total_pages. The new total number of pages.*

Modify the total number of pages.

#### get_enable_prev()

**@access** _public_

**@return** *(bool) $enable_prev. True if the previous page link should be displayed, false otherwise.*

Whether the previous page link should be displayed.

#### set_enable_prev()

**@access** _public_

**@param** *(bool) $enable_prev. True if the previous page link should be displayed, false otherwise.*

Specify whether the previous page link should be displayed.

#### get_enable_next()

**@access** _public_

**@return** *(bool) $enable_next. True if the next page link should be displayed, false otherwise.*

Whether the next page link should be displayed.

#### set_enable_next()

**@access** _public_

**@param** *(bool) $enable_next. True if the next page link should be displayed, false otherwise.*

Specify whether the next page link should be displayed.

#### get_enable_first()

**@access** _public_

**@return** *(bool) $enable_first. True if the first page link should be displayed, false otherwise.*

Whether the first page link should be displayed.

#### set_enable_first()

**@access** _public_

**@param** *(bool) $enable_first. True if the first page link should be displayed, false otherwise.*

Specify whether the first page link should be displayed.

#### get_enable_last()

**@access** _public_

**@return** *(bool) $enable_last. True if the last page link should be displayed, false otherwise.*

Whether the last page link should be displayed.

#### set_enable_last()

**@access** _public_

**@param** *(bool) $enable_last. True if the last page link should be displayed, false otherwise.*

Specify whether the last page link should be displayed.

- - - 

### Carbon\_Pagination\_Builder

**TBD**

- - - 

### Carbon\_Pagination\_Posts

**TBD**

- - - 

### Carbon\_Pagination\_Post

**TBD**

- - - 

### Carbon\_Pagination\_Comments

**TBD**

- - - 

### Carbon\_Pagination\_Custom

**TBD**

- - - 

### Carbon\_Pagination\_Exception

**TBD**

- - -

Extending Guidelines & Examples
-------------------------------

**TBD**
