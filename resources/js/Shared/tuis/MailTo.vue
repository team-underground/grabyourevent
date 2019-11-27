<template>
	<a
		:href="`mailto:${to}?subject=${subject || ''}`"
		class="mailtoui inline-flex"
		:class="[{ 'text-orange-600 border-b-2 border-orange-200 hover:text-orange-700 hover:border-orange-400': styled == true}]"
	>
		<slot></slot>
	</a>
</template>
<script>
const MailtoUI = require("mailtoui/dist/mailtoui-min.js");
export default {
	props: {
		to: {
			type: String,
			default: "hello@grabyourevent.com"
		},
		subject: {
			type: String,
			default: "Subject goes here"
		},
		styled: {
			type: Boolean,
			default: true
		}
	},
	mounted() {
		MailtoUI.run();
	}
};
</script>