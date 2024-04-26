<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
//    /**
//     * @var array
//     */
//    private array $queryParams = [];

    /**
     * AbstractFilter constructor.
     *
     * @param array $queryParams
     */
    public function __construct(protected array $queryParams = [])
    {
//        $this->queryParams = $queryParams;
    }

    /**
     * @return array
     */
    abstract protected function getCallbacks(): array;

    /**
     * @param  Builder  $builder
     * @return void
     */
    public function apply(Builder $builder): void
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     */
    protected function before(Builder $builder)
    {
    }

    /**
     * @param string $key
     * @param  mixed|null  $default
     *
     * @return mixed|null
     */
    protected function getQueryParam(string $key, mixed $default = null): array|null
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param string[] $keys
     *
     * @return AbstractFilter
     */
    protected function removeQueryParam(string ...$keys): AbstractFilter
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
