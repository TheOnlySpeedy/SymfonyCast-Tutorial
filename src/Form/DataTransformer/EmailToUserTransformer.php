<?php
/**
 * Created by PhpStorm.
 * User: schmidfl
 * Date: 25.01.2019
 * Time: 10:31
 */

namespace App\Form\DataTransformer;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EmailToUserTransformer implements DataTransformerInterface {

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var callable
     */
    private $finderCallback;

    public function __construct(UserRepository $userRepository, callable $finderCallback) {
        $this->userRepository = $userRepository;
        $this->finderCallback = $finderCallback;
    }

    public function transform($value) {
        if (null === $value) {
            return '';
        }

        if (!$value instanceof User) {
            throw new \LogicException('The UserSelectTextType can only be used with User objects.');
        }

        return $value->getEmail();
    }

    public function reverseTransform($value) {
        if (!$value) {
            return;
        }

        $callback = $this->finderCallback;
        $user = $callback($this->userRepository, $value);

        if (!$user) {
            throw new TransformationFailedException(sprintf('No user found with email %s', $value));
        }

        return $user;
    }
}