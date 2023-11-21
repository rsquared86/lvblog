import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

// default index function
export default function Index({ auth, blogPosts }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        title: '',
        content: '',
    });
    //console.log(blogPosts);


    return (
        <AuthenticatedLayout
            user={auth.user}>
        <div>
            
            <h1 className="mb-8 text-3xl font-bold">Blogs</h1>
            <div className='mb-8 text-left'>
                <a className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full' href={route('blog.create')}>Create Blog Post</a>
            </div>
            <table className="table-fixed shadow-lg bg-white border-collapse">
                <thead>
                    <tr>
                    <th className=" w-1/1 bg-blue-100 border text-left px-8 py-4">Title</th>
                        <th className=" w-1/5 bg-blue-100 border text-left px-8 py-4">View</th>
                        
                    </tr>
                </thead>
                {blogPosts.map((post) => {
                    return (

                        <tbody>
                            <tr className='hover:bg-gray-50 focus:bg-gray-300 active:bg-red-200"'>
                                <td className="border px-4 py-2" colSpan="1">{post.title}</td>
                                <td className="border px-4 py-2" colSpan="1">
                                    <a className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full' href={route('blog.show', post.id)} active={route().current('blog.index')}>
                                        View Post
                                    </a>
                                </td>
                                <td className="border px-4 py-2" colSpan="1">
                                <a className='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full' href={route('blog.destroy', post.id)} method="delete" active={route().current('blog.index')}>
                                        Delete Post
                                    </a>

                                </td>
                            </tr>
                        </tbody>
                    );
                })}
            </table>

       
            </div>
            </AuthenticatedLayout>
    );
}
