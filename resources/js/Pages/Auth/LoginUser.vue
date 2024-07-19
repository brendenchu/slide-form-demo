<script setup lang="ts">
  import GuestLayout from '@/Layouts/GuestLayout.vue'
  import InputError from '@/Components/Form/FormError.vue'
  import InputLabel from '@/Components/Form/FormLabel.vue'
  import PrimaryButton from '@/Components/PrimaryButton.vue'
  import InputField from '@/Components/Form/FormField.vue'
  import { Head, useForm } from '@inertiajs/vue3'

  defineProps<{
    canResetPassword?: boolean
    status?: string
  }>()

  const form = useForm({
    email: '',
    password: '',
    remember: false,
  })

  const submit = () => {
    form.post(route('login'), {
      onFinish: () => {
        form.reset('password')
      },
    })
  }
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />

    <div v-if="status" class="mb-3 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="email" value="Email" />

        <InputField
          id="email"
          v-model="form.email"
          type="email"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="username"
        />

        <InputError class="mt-1" :message="form.errors.email" />
      </div>

      <div class="mt-3">
        <InputLabel for="password" value="Password" />

        <InputField
          id="password"
          v-model="form.password"
          type="password"
          class="mt-1 block w-full"
          required
          autocomplete="current-password"
        />

        <InputError class="mt-1" :message="form.errors.password" />
      </div>

      <!--      <div class="block mt-3">-->
      <!--        <label class="flex items-center">-->
      <!--          <Checkbox v-model:checked="form.remember" name="remember" />-->
      <!--          <span class="ml-2 text-sm text-gray-600">Remember me</span>-->
      <!--        </label>-->
      <!--      </div>-->

      <div class="flex items-center justify-end mt-3">
        <!--        <Link-->
        <!--          v-if="canResetPassword"-->
        <!--          :href="route('password.request')"-->
        <!--          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
        <!--        >-->
        <!--          Forgot your password?-->
        <!--        </Link>-->

        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Log In
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
