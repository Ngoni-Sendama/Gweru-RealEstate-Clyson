<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Flowframe\Trend\Trend;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class MessagesChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'messagesChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'MessagesChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $data = Trend::model(Contact::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();


        $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'];

        $months = $data->pluck('date')->map(function ($date) use ($daysOfWeek) {
            // Check if $date is already a DateTime object
            if ($date instanceof \DateTime) {
                $dayIndex = $date->format('w');
                return $daysOfWeek[$dayIndex];
            }

            // If $date is a string, attempt to parse it into a DateTime object
            try {
                $dateTime = new \DateTime($date);
                $dayIndex = $dateTime->format('w');
                return $daysOfWeek[$dayIndex];
            } catch (\Exception $e) {
                // If parsing fails, return null or handle the error accordingly
                return null;
            }
        });

        $ContactCounts = $data->pluck('aggregate');

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'MessagesChart',
                    'data' => $ContactCounts,
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
            'colors' => ['#006400'],
        ];
    }
}
