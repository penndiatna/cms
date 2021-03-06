<?php
/**
 * Licensed under The GPL-3.0 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since    2.0.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickappscms.org
 * @license  http://opensource.org/licenses/gpl-3.0.html GPL-3.0 License
 */
namespace User\Controller\Admin;

use User\Controller\AppController;
use User\Controller\UserSignTrait;

/**
 * Gateway manager controller.
 *
 * Provides login and logout methods for backend.
 */
class GatewayController extends AppController
{

    use UserSignTrait;
}
