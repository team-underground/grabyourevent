<template>
	<div id="app">
		<div class="random">
			<trend-chart
				:datasets="datasets"
				:grid="grid"
				:labels="labels"
				:min="0"
				:interactive="true"
				@mouseMove="onMouseMove"
				class="random-chart"
			></trend-chart>
			<div id="pop" role="tooltip" ref="tooltip" class="tooltip" :class="{ 'is-active': tooltipData }">
				<div class="tooltip-container" v-if="tooltipData">
					<strong>{{ labels.xLabels[tooltipData.index] }}</strong>
					<div class="tooltip-data">
						<div class="tooltip-data-item tooltip-data-item--1">
							Total views:&nbsp;
							<strong>{{ tooltipData.data[0] }}</strong>
						</div>
						<div class="tooltip-data-item tooltip-data-item--2">
							Unique views:&nbsp;
							<strong>{{ tooltipData.data[1] }}</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from "axios";
import TrendChart from "vue-trend-chart";
import moment from "moment";
import Popper from "popper.js";

export default {
	components: {
		TrendChart
	},
	props: {
		total: Object,
		unique: Object
	},
	data() {
		return {
			datasets: [
				{
					data: Object.values(this.total),
					smooth: true,
					showPoints: true,
					fill: true,
					className: "curve1"
				},
				{
					data: Object.values(this.unique),
					smooth: true,
					showPoints: true,
					className: "curve2"
				}
			],
			grid: {
				verticalLines: true,
				horizontalLines: true
			},
			labels: {
				xLabels: Object.keys(this.total).map(value =>
					moment(value).format("DD, MMM")
				),
				yLabels: 2,
				yLabelsTextFormatter: val =>
					Math.round(val * 100) / 100 + " views"
			},
			tooltipData: null,
			popper: null,
			popperIsActive: false
		};
	},
	methods: {
		initPopper() {
			const chart = document.querySelector(".random-chart");
			const ref = chart.querySelector(".active-line");
			const tooltip = this.$refs.tooltip;
			this.popper = new Popper(ref, tooltip, {
				placement: "right",
				modifiers: {
					offset: { offset: "0,10" },
					preventOverflow: {
						boundariesElement: chart
					}
				}
			});
		},
		onMouseMove(params) {
			this.popperIsActive = !!params;
			this.popper.scheduleUpdate();
			this.tooltipData = params || null;
		}
	},
	mounted() {
		this.initPopper();
	}
};
</script>