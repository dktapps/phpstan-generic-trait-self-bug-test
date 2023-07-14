<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
 */

declare(strict_types=1);


use function array_map;
use function count;
use function mb_strtoupper;
use function preg_match;

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

trait EnumTrait{
	/** @phpstan-use RegistryTrait<self> */
	use RegistryTrait;
}
	
class StairShape{
	use EnumTrait;
}


