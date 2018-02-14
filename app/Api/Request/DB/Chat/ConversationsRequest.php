<?php

namespace App\Api\Request\DB\Chat;


use App\Api\Request\DB\MultiRequest;
use App\Http\Resources\Conversation;
use App\Message;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Collection;

class ConversationsRequest extends MultiRequest
{
    protected $modelClass = Message::class;
    protected $resourceClass = Conversation::class;
    protected $orderBased = true;

    protected $defaultScope = Message::SCOPE_PERSONAL;

    /** @var Guard */
    protected $guard;

    /**
     * ConversationsRequest constructor.
     * @param Guard $guard
     */
    public function __construct(Guard $guard)
    {
        parent::__construct($this->modelClass, $this->resourceClass, $this->orderBased);
        $this->guard = $guard;
    }

    /**
     * @inheritDoc
     */
    protected function shouldResolve()
    {
        return $this->guard->check();
    }

    /**
     * @inheritdoc
     */
    protected function additionalQuery($query, Collection $parameters)
    {
        parent::additionalQuery($query, $parameters);

        /** @var User $user */
        $user = $this->guard->user();

        $query->scopes(['conversationsWith' => $user->username]);

        return $query;
    }
}