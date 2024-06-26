<template>
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">User Profile</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">This is User Profile for Regov Technologies Assignment</p>
        </div>
        <form @submit.prevent="submitForm" class="mx-auto mt-16 max-w-xl sm:mt-20">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Name</label>
                    <div class="mt-2.5">
                        <input v-model="user.name" type="text" name="name" id="name" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input v-model="user.email" type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="about_me" class="block text-sm font-semibold leading-6 text-gray-900">About Me</label>
                    <div class="mt-2.5">
                        <textarea v-model="user.about_me" name="about_me" id="about_me" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
                <div class="flex gap-x-4 sm:col-span-2"></div>
            </div>
            <div class="mt-10 flex gap-4">
                <button @click.prevent="saveDraft" class="block w-full rounded-md bg-gray-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Save as Draft</button>
                <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
        </form>

        <button @click.prevent="logout" class="logout-button fixed bottom-4 left-4 rounded-md bg-red-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Log Out</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            user: {
                name: '',
                email: '',
                about_me: ''
            }
        }
    },
    created() {
        const user = sessionStorage.getItem('user');
        if (user) {
            this.user = JSON.parse(user);
        } else {
            this.$router.push('/');
        }

        const draft = localStorage.getItem('draft');
        if (draft) {
            this.user = { ...this.user, ...JSON.parse(draft) };
        }
    },
    methods: {
        saveDraft() {
            try {
                localStorage.setItem('draft', JSON.stringify(this.user));
                alert('Draft saved locally');
            } catch (error) {
                console.error('Error saving draft:', error);
            }
        },
        async submitForm() {
            try {
                const response = await axios.post('/users/update', {...this.user});
                if (response.data.status === 'success') {
                    alert('Profile submitted successfully');
                    localStorage.removeItem('draft'); // Clear draft after submission
                    sessionStorage.setItem('user', JSON.stringify(response.data.user));
                }
            } catch (error) {
                console.error('Error submitting profile:', error);
            }
        },
        async logout() {
            try {
                await axios.post('/users/logout');
                sessionStorage.removeItem('user');
                localStorage.removeItem('draft'); // Clear draft on logout
                this.$router.push('/');
            } catch (error) {
                console.error('Error during logout:', error);
            }
        }
    }
}
</script>

<style scoped>
.logout-button {
    position: fixed;
    bottom: 1rem;
    left: 1rem;
}
</style>
