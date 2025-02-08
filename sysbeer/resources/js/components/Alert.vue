<template>
    <div v-if="visible" :class="['alert', type]">
      {{ message }}
    </div>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: 'success', 
    },
    message: {
      type: String,
      required: true,
    },
    visible: {
      type: Boolean,
      default: false,
    },
  },
};
</script>

<style scoped>
.alert {
  padding: 10px;
  margin: 10px 0;
  border-radius: 4px;
}

.success {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

.error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}
</style>