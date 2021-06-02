<?php

namespace WebId\Cafe\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryCommand extends GeneratorCommand
{
    public $signature = 'make:repo {name : The model name (ex: User)}';

    public $description = 'Create a repository class.';

    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/repository.stub';
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getPath($name): string
    {
        $className = $this->getModelName($name);
        return config('cafe.repository.folder_path') . "/$className" . 'Repository.php';
    }

    /**
     * @param  string  $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceModelNamespace($stub, config('cafe.repository.model_namespace'))
            ->replaceModelName($stub, $this->getModelName($name));
    }
    /**
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceModelName(&$stub, $name)
    {
        return str_replace('DummyModelName', $name, $stub);
    }

    /**
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceModelNamespace(&$stub, $namespace)
    {
        $stub = str_replace('DummyModelNamespace', $namespace, $stub);
        return $this;
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getModelName(string $name): string
    {
        $className = explode('\\', $name);
        return ucfirst($className[count($className) - 1]);
    }
}
