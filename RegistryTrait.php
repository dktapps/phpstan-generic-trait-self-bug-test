<?php

/**
 * This trait allows a class to simulate object class constants, since PHP doesn't currently support this.
 * These faux constants are exposed in static class methods, which are handled using __callStatic().
 *
 * Classes using this trait need to include \@method tags in their class docblock for every faux constant.
 * Alternatively, just put \@generate-registry-docblock in the docblock and run tools/generate-registry-annotations.php
 *
 * @phpstan-template T of object
 */
trait RegistryTrait{
	/**
	 * @var object[]
	 * @phpstan-var array<string, T>
	 */
	private static $members;

	private function dummy() : void{
		\PHPStan\dumpType(self::$members);
	}
}
