<template>
    <button 
        :class="[
            'px-4 py-2 rounded-lg font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 flex items-center justify-center',
            typeClasses,
            $attrs.class
        ]"
        v-bind="$attrs"
    >
        <slot />
    </button>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    type: {
        type: String,
        default: 'primary',
        validator: (value) => ['primary', 'secondary', 'error', 'success', 'warning'].includes(value)
    }
});

const typeClasses = computed(() => {
    switch (props.type) {
        case 'primary':
            return 'bg-primary text-white hover:bg-primary-hover active:bg-primary-active focus:ring-primary';
        case 'secondary':
            return 'bg-secondary text-white hover:bg-secondary-hover active:bg-secondary-active focus:ring-secondary';
        case 'error':
            return 'bg-status-error text-white hover:opacity-90 active:opacity-100 focus:ring-status-error';
        case 'success':
            return 'bg-status-success text-white hover:opacity-90 active:opacity-100 focus:ring-status-success';
        case 'warning':
            return 'bg-status-warning text-white hover:opacity-90 active:opacity-100 focus:ring-status-warning';
        default:
            return 'bg-primary text-white hover:bg-primary-hover active:bg-primary-active focus:ring-primary';
    }
});
</script>
