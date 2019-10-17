<template>
	<a
		:href="to"
		class="inline-flex text-orange-600 border-b-2 border-orange-200 hover:text-orange-700 hover:border-orange-400"
	>
		<slot></slot>
	</a>
</template>

<script>
export default {
	props: {
		to: {
			type: String
		}
	}
};
</script>