<script setup lang="ts">
  import { Slide } from '@/Components/Slide'
  import { InertiaForm, useForm } from '@inertiajs/vue3'
  import { Checkbox, Error, Field, Fieldset, GroupWrapper, Label } from '@/Components/Form'
  import { onMounted, ref } from 'vue'
  import { Project, ProjectStep, SectionAFormFields } from '@/types'
  import { Action, Direction, SlideOptions } from '@/Components/Slide/types'
  import { delay, delta, nullifyFields, prevNextSteps, saveForm } from '@/Components/Story/v1/helpers'

  // The component's props
  const props = defineProps<{
    project: Project
    step: ProjectStep
    token: string
    page: number
    direction: Direction
    story: SectionAFormFields
  }>()

  // The form fields and their initial values
  const form: InertiaForm<SectionAFormFields> = useForm(props.story)

  // The previous and next steps
  const steps = prevNextSteps(props.step)

  // The fields that are toggled by checkboxes, grouped by page
  const toggledFields: Record<number, Record<string, string>> = {
    1: {
      section_a_1: 'section_a_4',
      section_a_2: 'section_a_5',
      section_a_3: 'section_a_6',
    },
  }
  // The current page
  const current = ref<number>(0)

  // The previous page
  const previous = ref<number>(0)

  // The direction of the slide
  const formDirection = ref<Direction>('next')

  // The total number of pages
  const pages = ref<number>(2)

  // The slide actions
  const actions = ref<SlideOptions<Action>>({
    // The next action
    next: {
      label: 'Save & Continue »',
      callback: () => {
        // If any checkboxes are checked, set the fields that are toggled to null
        nullifyFields(form, toggledFields, current.value)
        // Save the form, then shift current page by the delta amount
        saveForm(
          form,
          {
            project: props.project,
            step: props.step,
            page: current.value,
            token: props.token,
          },
          async () => {
            current.value += delta(current.value, toggledFields)
            previous.value = current.value - 1
            formDirection.value = 'next'
            // If the current page is greater than the total number of pages, redirect to the next step
            if (current.value > pages.value) {
              await delay()
              window.location.href = route('story.form', {
                project: props.project,
                step: steps.next,
                token: props.token,
              })
            }
          }
        )
      },
    },
    // The previous action
    previous: {
      label: '« Go Back',
      forced: true, // Always show the previous button
      callback: async () => {
        current.value -= delta(current.value - 2, toggledFields)
        previous.value = current.value - 1
        formDirection.value = 'previous'
        // If the current page is 0, redirect to the previous step
        if (current.value < 1) {
          await delay()
          window.location.href = route('story.form', {
            project: props.project,
            step: steps.previous,
            token: props.token,
            page: 1,
            direction: formDirection.value,
          })
        }
      },
    },
  })

  // When the component is mounted, set the current, previous, and direction values
  onMounted(() => {
    current.value = props.page
    previous.value = current.value - 1
    formDirection.value = props.direction
  })
</script>

<template>
  <form class="stretched prose">
    <Slide :current="current" :pages="pages" :actions="actions" :direction="formDirection">
      <template #page-1>
        <Fieldset>
          <div>
            <p>Here's a slightly different layout.</p>
          </div>
          <GroupWrapper grid>
            <div class="flex gap-3">
              <Checkbox id="section_a_1" v-model:checked="form.section_a_1" :value="1" />
              <Label for="section_a_1">
                <strong class="text-2xl">Checkbox 1</strong>
              </Label>
            </div>
            <div class="flex gap-3">
              <Checkbox id="section_a_2" v-model:checked="form.section_a_2" :value="1" />
              <Label for="section_a_2">
                <strong class="text-2xl">Checkbox 2</strong>
              </Label>
            </div>
            <div class="flex gap-3">
              <Checkbox id="section_a_3" v-model:checked="form.section_a_3" :value="1" />
              <Label for="section_a_3">
                <strong class="text-2xl">Checkbox 3</strong>
              </Label>
            </div>
          </GroupWrapper>
        </Fieldset>
      </template>
      <template #page-2>
        <Fieldset>
          <GroupWrapper>
            <div v-if="form.section_a_1">
              <Label for="section_a_4">
                <strong>Question 1</strong>
                <small> You see this question because you ticked Checkbox 1. </small>
              </Label>
              <Field id="section_a_4" v-model="form.section_a_4" class="form-field" type="number" />
              <Error :message="form.errors.section_a_4" class="mt-1" />
            </div>
            <div v-if="form.section_a_2">
              <Label for="section_a_5">
                <strong>Question 2</strong>
                <small> You see this question because you ticked Checkbox 2. </small>
              </Label>
              <Field id="section_a_5" v-model="form.section_a_5" class="form-field" type="number" />
              <Error :message="form.errors.section_a_5" class="mt-1" />
            </div>
            <div v-if="form.section_a_3">
              <Label for="section_a_6">
                <strong>Question 3</strong>
                <small> You see this question because you ticked Checkbox 3. </small>
              </Label>
              <Field id="section_a_6" v-model="form.section_a_6" class="form-field" type="number" />
              <Error :message="form.errors.section_a_6" class="mt-1" />
            </div>
          </GroupWrapper>
        </Fieldset>
      </template>
    </Slide>
  </form>
</template>

<style scoped lang="postcss"></style>
