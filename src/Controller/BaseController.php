<?php
/**
 * Created by PhpStorm.
 * User: schmidfl
 * Date: 15.11.2018
 * Time: 10:56
 */

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class BaseController
 * @package App\Controller
 *
 * @method User|null getUser()
 */
abstract class BaseController extends AbstractController {

}