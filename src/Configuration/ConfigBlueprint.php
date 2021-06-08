<?php

	namespace DDM\Faviconator\Configuration;

	use DDM\Faviconator\Faviconator;
	use Statamic\Facades\AssetContainer;
	use Statamic\Tags\Asset;

	/**
	 * Class ConfigBlueprint
	 * @package DDM\Faviconator\Configuration
	 * @author  DDM Studio
	 */
	class ConfigBlueprint {

		private static function getAssetsContainerHandle() {
			$configHandle = Faviconator::getConfig('assets.container') ?? '';

			return AssetContainer::findByHandle($configHandle) ? $configHandle : AssetContainer::all()->all()[0]->handle();
		}

		public static function getBlueprint(): array {
			return [
				'sections' => [
					'general' => [
						'display' => Faviconator::getCpTranslation('tab_general'),
						'fields' => [
							[
								'handle' => 'file_png',
								'field' => [
									'type' => 'assets',
									'display' => Faviconator::getCpTranslation('file_png'),
									'instructions' => Faviconator::getCpTranslation('file_png_instructions'),
									'placeholder' => Faviconator::getCpTranslation('file_png_placeholder'),
									'container' => self::getAssetsContainerHandle(),
									'max_files' => 1,
									'width' => 50,
//									'validate' => [
//										'mimes:png'
//									]
								]
							],
							[
								'handle' => 'file_svg',
								'field' => [
									'type' => 'assets',
									'display' => Faviconator::getCpTranslation('file_svg'),
									'instructions' => Faviconator::getCpTranslation('file_svg_instructions'),
									'placeholder' => Faviconator::getCpTranslation('file_svg_placeholder'),
									'container' => self::getAssetsContainerHandle(),
									'max_files' => 1,
									'width' => 50,
//									'validate' => [
//										'mimes:svg'
//									]
								]
							],
							[
								'handle' => 'app_name',
								'field' => [
									'type' => 'text',
									'display' => Faviconator::getCpTranslation('app_name'),
									'instructions' => Faviconator::getCpTranslation('app_name_instructions'),
									'placeholder' => Faviconator::getCpTranslation('app_name_placeholder'),
								]
							],
							[
								'handle' => 'theme_color',
								'field' => [
									'type' => 'color',
									'display' => Faviconator::getCpTranslation('theme_color'),
									'instructions' => Faviconator::getCpTranslation('theme_color_instructions'),
									'placeholder' => Faviconator::getCpTranslation('theme_color_placeholder'),
									'color_modes' => [
										'hex',
									],
									'default_color_mode' => 'HEXA',
								]
							]
						]
					]
				]
			];
		}

	}