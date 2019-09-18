<template>
	<div>
		<p :class="cssClasses" v-if="tag == 'p'">
			<slot></slot>
		</p>
		<h1 :class="cssClasses" v-if="tag == 'h1'">
			<slot></slot>
		</h1>
		<h2 :class="cssClasses" v-if="tag == 'h2'">
			<slot></slot>
		</h2>
		<h3 :class="cssClasses" v-if="tag == 'h3'">
			<slot></slot>
		</h3>
		<h4 :class="cssClasses" v-if="tag == 'h4'">
			<slot></slot>
		</h4>
	</div>
</template>

<script>
export default {
	props: {
		tag: {
			type: String,
			default: "p"
		},
		size: {
			type: String,
			default: "normal"
		},
		color: {
			type: String,
			default: ""
		}
	},

	computed: {
		cssClasses() {
			return [
				{
					"text-sm text-gray-600 leading-normal":
						this.size == "small",
					"text-base text-gray-600 leading-normal":
						this.size == "normal",
					"text-lg text-gray-700 font-semibold leading-normal":
						this.size == "large",
					"text-2xl text-gray-700 font-bold leading-tight":
						this.size == "heading",
					"text-4xl text-gray-700 font-bold leading-tight":
						this.size == "heading2",
					"text-gray-500 text-xs font-bold tracking-wider uppercase":
						this.size == "small-caps",
					"text-5xl text-gray-700 leading-none font-bold tracking-tight":
						this.size == "display",
					"text-6xl text-gray-700 leading-none font-bold tracking-tight":
						this.size == "display2"
				},
				this.color
			];
		}
	}
};
</script>