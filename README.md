
## 404 Suggested Page

This plugin gives you a published page suggestion when matches with permalinks are not found.

Whenever the user intentends to visit the page `/blogs` and navigates to to `/bogs` or `/bglo` because of a typo made by the user. **This plugin will suggest the user to the `/blogs` page**.

## Installation

#### Installation from within WordPress

* Visit **Plugins > Add New**.
* Search for **404 Suggested Page**.
* Install and activate the 404 Suggested Page plugin.

#### Manual installation

* Upload the entire `404-suggested-page` folder to the `/wp-content/plugins/` directory.
* Visit **Plugins**.
* Activate the 404 Suggested Page plugin.

**Enjoy! 😁**

## Usage

To use this plugin you need to call the `get_the_suggested_page()` method.
This will return a [WP_Post](https://developer.wordpress.org/reference/classes/wp_post/)  object.

#### Access the suggested page properties by calling:
* `get_the_suggested_page()->guid;` for the **URL**.
* `get_the_suggested_page()->post_title;` for the **name**.
* `get_the_suggested_page()->post_name;` for the **slug**.

### Example

Create an anchor tag to the suggested page in the 404.php file.

```
<p>
	The page you were looking for could not be found. Did you mean:
	<span>
		<a href="<?= get_the_suggested_page()->guid ?>"><?= get_the_suggested_page()->post_title ?><a>
	</span>
</p>
```

Alternatively, you can use the shortcode to display the suggested-page

```
<?php echo do_shortcode('[suggested_page]'); ?>
```
