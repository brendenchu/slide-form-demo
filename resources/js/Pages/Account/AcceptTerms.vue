<script setup lang="ts">
  import { ref } from 'vue'
  import { Head, useForm } from '@inertiajs/vue3'
  import StoryLayout from '@/Layouts/StoryLayout.vue'
  import PrimaryButton from '@/Components/PrimaryButton.vue'

  const props = defineProps<{
    terms: {
      id: number
      version: string
    }
  }>()

  const form = useForm({
    confirmation: false,
  })

  const accepted = ref(false)

  const submit = () => {
    if (!accepted.value) {
      return
    }

    form.post(
      route('terms.accept', {
        terms: props.terms.id,
      })
    )
  }
</script>

<template>
  <Head title="Accept Terms of Service" />

  <StoryLayout>
    <section class="stretched">
      <div class="stretched contained centered">
        <div class="prose">
          <h1>Terms of Service</h1>
          <p>You must accept the latest terms and conditions before you can continue.</p>
          <form
            class="flex gap-3 border rounded-2xl p-8 shadow bg-base-100 items-center justify-between"
            @submit.prevent="submit"
          >
            <div>
              <label>
                <input
                  v-model="accepted"
                  type="checkbox"
                  name="confirmation"
                  class="checkbox checkbox-lg checkbox-primary mr-2"
                />
                I accept the latest terms and conditions.
              </label>
            </div>
            <div>
              <PrimaryButton :disabled="!accepted">Continue</PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </section>
  </StoryLayout>
</template>

<style scoped lang="postcss"></style>
