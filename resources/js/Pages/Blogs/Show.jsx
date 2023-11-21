import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

// default index function
export default function Show({ auth, blogPost }) {


    return (
        <AuthenticatedLayout
            user={auth.user}>
        
        <div>
            
            

                {blogPost.map((blogpost) => {
                    return (
                       <><h1 className="mb-8 text-3xl font-bold">{blogpost.title}</h1>  
                        <div><p>{blogpost.content}</p></div>
                        <div className='mb-8 text-left'>
                            <a className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full' href={route('blog.edit', blogpost.id)}>Edit Blog Post</a>
                        </div>
                        </>

                    );
                })}
            </div>
            </AuthenticatedLayout>
    );
}
