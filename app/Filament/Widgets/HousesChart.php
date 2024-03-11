<?php

namespace App\Filament\Widgets;

use App\Models\House;
use Flowframe\Trend\Trend;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class HousesChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'housesChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'HousesChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $data = Trend::model(House::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
    
    $months = $data->pluck('date')->map(function ($date) {
        // Check if $date is already a DateTime object
        if ($date instanceof \DateTime) {
            return $date->format('F'); // 'F' returns the full month name
        }
    
        // If $date is a string, attempt to parse it into a DateTime object
        try {
            $dateTime = new \DateTime($date);
            return $dateTime->format('F');
        } catch (\Exception $e) {
            // If parsing fails, return null or handle the error accordingly
            return null;
        }
    });
    
    $propertyCounts = $data->pluck('aggregate');
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'HousesChart',
                    'data' => $propertyCounts,
                ],
            ],
            'xaxis' => [
                'categories' => $months->filter()->values()->toArray(),
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
