import React, { useEffect } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

// default index function
export default function Edit({ auth, blogPost }) {

    const { data, setData, put, processing, errors, reset } = useForm({
        title: blogPost[0].title,
        content: blogPost[0].content,
        slug: blogPost[0].slug,
        post_id: blogPost[0].id,
    });
    console.log(data.post_id)
    const submit = (e) => {
        e.preventDefault();
        console.log(data.title)
        put(route('blog.update', data.post_id ), { onSuccess: () => reset() });
    };



    return (
        <AuthenticatedLayout
            user={auth.user}>
                <div>
                        
                   
                        <h1 className="mb-8 text-3xl font-bold">Edit Blog Post</h1>
                        <form onSubmit={submit}>
                            <div className="mb-4">
                                <label htmlFor="title" className="block mb-2 text-sm text-gray-600">
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
                                <label htmlFor="content" className="block mb-2 text-sm text-gray-600">
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
                                <label htmlFor="slug" className="block mb-2 text-sm text-gray-600">
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
                                    Update
                                </PrimaryButton>
                            </div>
                        </form>
                        
                </div>
        </AuthenticatedLayout>
    );
}
