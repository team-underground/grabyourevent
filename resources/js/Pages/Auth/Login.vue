<template>
    <div>
        <div
            class="relative px-4 lg:px-6 md:py-16 lg:py-24 bg-gray-100 h-screen flex items-center"
        >
            <div class="absolute left-0 right-0 top-0 bg-white">
                <div class="container px-4 mx-auto py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <link-to to="/">
                                <unicon
                                    name="angle-left"
                                    fill="currentColor"
                                ></unicon
                                >Back to Website
                            </link-to>
                        </div>
                        <div>
                            Don't have an account?
                            <link-to to="#">Create Account</link-to>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-md mx-auto w-full">
                <card>
                    <heading size="heading2" class="mb-1 text-center"
                        >Welcome back</heading
                    >
                    <heading class="mb-6 text-center" size="small"
                        >Please enter your email and password to
                        continue</heading
                    >
                    <form @submit.prevent="submit">
                        <text-input
                            class="mb-4"
                            with-icon
                            placeholder="Email address"
                            v-model="form.email"
                            :errors="errors['email']"
                            @keydown="delete errors['email']"
                        >
                            <template #icon>
                                <unicon
                                    name="envelope"
                                    fill="#ddd"
                                    width="30"
                                    height="30"
                                    class="mt-2"
                                ></unicon>
                            </template>
                        </text-input>

                        <div class="relative">
                            <text-input
                                type="password"
                                class="mb-5"
                                with-icon
                                placeholder="Password"
                                v-model="form.password"
                                :errors="errors['password']"
                                @keydown="delete errors['password']"
                            >
                                <template #icon>
                                    <unicon
                                        name="lock"
                                        fill="#ddd"
                                        width="30"
                                        height="30"
                                        class="mt-2"
                                    ></unicon>
                                </template>
                            </text-input>
                        </div>
                        <loading-button
                            ref="submitButton"
                            class="w-full"
                            variant="warning"
                            type="submit"
                            >Sign in</loading-button
                        >
                    </form>
                    <a
                        class="text-gray-500 hover:text-orange-700 block mt-4"
                        href="#"
                        >Forgot Password?</a
                    >

                    <!-- </div>
					</div>-->
                    <!-- <template #footer>
						<heading class="py-2 text-center">
							Don't have an account?
							<link-to to="#">Create Account</link-to>
						</heading>
					</template>-->
                </card>
                <div class="text-center mt-4 text-sm text-gray-500">
                    Copyrights &copy; 2019 grabyourevent.com
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import TextInput from "@/Shared/tuis/TextInput";

export default {
    props: ["errors"],
    components: {
        Layout,
        Card,
        Heading,
        LinkTo,
        LoadingButton,
        TextInput
    },
    data() {
        return {
            form: {
                email: null,
                password: null
            }
        };
    },
    methods: {
        submit() {
            this.$refs.submitButton.startLoading();

            this.$inertia
                .post(this.route("login.attempt"), this.form)
                .then(() => {
                    this.$refs.submitButton.stopLoading();
                });
        }
    }
};
</script>
