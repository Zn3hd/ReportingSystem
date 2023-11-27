<!-- report-chart.vue -->

<template>
  <div>
    <canvas ref="chart"></canvas>
  </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
    props: ['reportSummary'],
    mounted() {
        this.renderChart();
    },
    methods: {
        renderChart() {
            const labels = this.reportSummary.map(report => report.status);
            const data = this.reportSummary.map(report => report.total);

            const ctx = this.$refs.chart.getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: 'Report Counts',
                        data,
                        backgroundColor: ['red', 'blue', 'green', 'yellow', 'orange'],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });
        },
    },
};
</script>
