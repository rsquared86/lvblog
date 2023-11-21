import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

// default index function
export default function Create({ auth }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        title: '',
        content: '',
        slug: '',
    });

    const submit = (e) => {
        e.preventDefault();
        
        post(route('blog.store'), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}>
                <div>
                        
                        <h1 className="mb-8 text-3xl font-bold">Create Blog Post</h1>
                        <form onSubmit={submit}>
                            
                            
                            <div className="mb-4">
                                <label htmlFor="title" className="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                    Title
                                </label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    className={`block w-full p-2 border rounded-md outline-none text-gray-600 bg-gray-50 border-gray-300 focus:border-blue-500 ${
                                        errors.title ? 'border-red-500' : ''
                                    }`}
                                    value={data.title}
                                    onChange={(e) => setData('title', e.target.value)}
                                    required
                                    autoFocus
                                    autoComplete="title"
                                />
                                <InputError error={errors.title} />
                            </div>
            
                            <div className="mb-4">
                                <label htmlFor="content" className="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                    Content
                                </label>
                                <textarea
                                    type="text"
                                    name="content"
                                    id="content"
                                    className={`block w-full p-2 border rounded-md outline-none text-gray-600 bg-gray-50 border-gray-300 focus:border-blue-500 ${
                                        errors.content ? 'border-red-500' : ''
                                    }`}
                                    value={data.content}
                                    onChange={(e) => setData('content', e.target.value)}
                                    required
                                    autoFocus
                                    autoComplete="content"
                                />
                                <InputError error={errors.content} />
                            </div>
                            <div className="mb-4">
                                <label htmlFor="slug" className="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                    Unique URL
                                </label>
                                <textarea
                                    type="text"
                                    name="slug"
                                    id="slug"
                                    className={`block w-full p-2 border rounded-md outline-none text-gray-600 bg-gray-50 border-gray-300 focus:border-blue-500 ${
                                        errors.slug ? 'border-red-500' : ''
                                    }`}
                                    value={data.slug}
                                    onChange={(e) => setData('slug', e.target.value)}
                                    required
                                    autoFocus
                                    autoComplete="slug"
                                />
                                <InputError error={errors.slug} />
                            </div>
                            <div className="flex items-center justify-end mt-4">
                                <PrimaryButton className="ml-4" processing={processing}>
                                    Create
                                </PrimaryButton>
                            </div>
                        </form>
                    
                </div>
        </AuthenticatedLayout>
    );
}
