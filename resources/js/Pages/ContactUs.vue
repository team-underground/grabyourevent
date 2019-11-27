<template>
	<div class="max-w-4xl mx-auto">
		<heading class="text-center mb-10">
			Questions? Drop us an email at
			<mail-to subject="Find any difficulty?" to="hello@grabyourevent.com">hello@grabyourevent.com</mail-to>.
			<br />We usually get back within 24 hours.
		</heading>
	</div>
</template>

<script>
const MailtoUI = require("mailtoui/dist/mailtoui-min.js");

import Heading from "@/Shared/tuis/Heading";
import MailTo from "@/Shared/tuis/MailTo";
import Card from "@/Shared/tuis/Card";

export default {
	components: {
		Heading,
		MailTo,
		Card
	},
	mounted() {
		MailtoUI.run();
	}
};
</script>


