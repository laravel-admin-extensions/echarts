# Use Echarts in laravel-admin

## Installation

```bash
composer require jxlwqq/echarts

php artisan vendor:publish --tag=laravel-admin-echarts
```

## Configuration

Open `config/admin.php`, add configurations that belong to this extension at `extensions` section.

```php
    'extensions' => [
        'echarts' => [
            // Set to `false` if you want to disable this extension
            'enable' => true,
        ]
    ]
```

## Usage

Create a view in views directory like `resources/views/admin/echarts.blade.php`, and add following codes:
```html
<!-- prepare a DOM container with width and height -->
<div id="main" style="width: 600px;height:400px;"></div>
<script type="text/javascript">
    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('main'));

    // specify chart configuration item and data
    var option = {
        title: {
            text: 'ECharts entry example'
        },
        tooltip: {},
        legend: {
            data:['Sales']
        },
        xAxis: {
            data: ["shirt","cardign","chiffon shirt","pants","heels","socks"]
        },
        yAxis: {},
        series: [{
            name: 'Sales',
            type: 'bar',
            data: [5, 20, 36, 10, 10, 20]
        }]
    };

    // use configuration item and data specified to show chart
    myChart.setOption(option);
</script>
```

Then show it on the page

```php
class EchartsController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Echarts')
            ->body(new Box('echarts demo', view('admin.echarts')));
    }
}
```

For more usage, please refer to the official [website](https://echarts.apache.org/en/index.html) of echarts.


License
------------
Licensed under [The MIT License (MIT)](LICENSE).
