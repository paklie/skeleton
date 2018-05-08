<?php
/**
 * CodeIgniter Skeleton
 *
 * A ready-to-use CodeIgniter skeleton  with tons of new features
 * and a whole new concept of hooks (actions and filters) as well
 * as a ready-to-use and application-free theme and plugins system.
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018, Kader Bouyakoub <bkader@mail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package 	CodeIgniter
 * @author 		Kader Bouyakoub <bkader@mail.com>
 * @copyright	Copyright (c) 2018, Kader Bouyakoub <bkader@mail.com>
 * @license 	http://opensource.org/licenses/MIT	MIT License
 * @link 		https://goo.gl/wGXHO9
 * @since 		1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller
 *
 * @package 	CodeIgniter
 * @subpackage 	Skeleton
 * @category 	Controllers
 * @author 		Kader Bouyakoub <bkader@mail.com>
 * @link 		https://goo.gl/wGXHO9
 * @copyright 	Copyright (c) 2018, Kader Bouyakoub (https://goo.gl/wGXHO9)
 * @since 		1.0.0
 * @version 	2.0.0
 */
class Admin extends Admin_Controller
{

	/**
	 * Class constructor.
	 * @access 	public
	 * @return 	void
	 */
	public function __construct()
	{
		parent::__construct();

		// Feel free to remove the following lines.
		$this->_highlight();

		add_action('after_admin_scripts', function($content) {
			$content .= <<<EOT
<script type="text/javascript">
	$(document).ready(function() {
		$("pre code").each(function(i, block) {
			hljs.highlightBlock(block);
		});
	});
</script>
EOT;
			return $content;
		});
	}

	// ------------------------------------------------------------------------

	/**
	 * Main admin panel page.
	 * @access 	public
	 * @return 	void
	 */
	public function index()
	{
		// EDIT THIS METHOD TO SUIT YOUR NEEDS.

		// Count all users.
		$this->data['count_users'] = $this->kbcore->users->count();

		// Count all themes.
		$this->data['count_themes'] = count($this->theme->get_themes());

		// Count all plugins.
		$this->data['count_plugins'] = count($this->kbcore->plugins->get_plugins());

		// Count all languages.
		$this->data['count_languages'] = count($this->config->item('languages'));

		// FEEL FREE TO REMOVE THE FOLLOWING LINE.
		$this->data['manifest'] = file_get_contents(KBPATH.'modules/menus/manifest.json');

		// Set page title and render view.
		$this->theme
			->set_title(line('CSK_ADMIN_ADMIN_PANEL'))
			->render($this->data);
	}

}