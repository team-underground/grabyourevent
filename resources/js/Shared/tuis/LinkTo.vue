<template>
    <component
        :is="tag"
        :href="to"
        class="text-orange-600 border-b-2 border-orange-200 hover:text-orange-700 hover:border-orange-400"
        :class="display"
    >
        <slot></slot>
    </component>
</template>

<script>
export default {
    props: {
        tag: {
            type: String,
            default: "a"
        },
        to: {
            type: String
        },
        display: {
            type: String,
            default: "inline-flex"
        }
    }
};
</script>
