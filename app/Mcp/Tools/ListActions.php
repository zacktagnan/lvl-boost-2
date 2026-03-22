<?php

namespace App\Mcp\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\File;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tool;

#[Description("List all Action classes in app/Actions.")]
class ListActions extends Tool
{
    /**
     * Handle the tool request.
     */
    public function handle(Request $request): Response
    {
        $path = app_path("Actions");

        if (!is_dir($path)) {
            return Response::text("No Actions directory found.");
        }

        $files = File::allFiles($path);
        $actions = collect($files)
            ->filter(fn($file) => $file->getExtension() === "php")
            ->map(
                fn($file) => str_replace(
                    "/",
                    "\\",
                    $file->getRelativePathname(),
                ),
            )
            ->map(fn($file) => str_replace(".php", "", $file))
            ->values()
            ->toArray();

        if (empty($actions)) {
            return Response::text("No Action classes found");
        }

        return Response::text(implode("\n", $actions));
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, \Illuminate\Contracts\JsonSchema\JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [];
    }
}
