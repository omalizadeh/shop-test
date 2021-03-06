<?php

namespace App\Http\Controllers\Admin\AttributeGroup;

use App\AttributeGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeGroupStoreRequest;
use App\Http\Requests\AttributeGroupUpdateRequest;
use App\Http\Requests\AttributeStoreRequest;
use App\Repositories\Interfaces\AttributeGroupRepositoryInterface;
use App\Repositories\Interfaces\AttributeRepositoryInterface;

class AttributeGroupController extends Controller
{
    private $attributeGroupRepository;
    private $attributeRepository;

    public function __construct(
        AttributeGroupRepositoryInterface $attributeGroupRepository,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->attributeGroupRepository = $attributeGroupRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $attributeGroups = $this->attributeGroupRepository->allOrderBy('position');
        return view('admins.attribute_groups.index', compact('attributeGroups'));
    }

    public function create()
    {
        return view('admins.attribute_groups.create');
    }

    public function store(AttributeGroupStoreRequest $request)
    {
        $request->merge(['position' => $this->attributeGroupRepository->nextPosition()]);
        try {
            $this->attributeGroupRepository->create($request->only(['name', 'type', 'position']));
            return redirect()->route('admins.attribute-groups.index')->with('success', 'گروه ترکیبات ایجاد شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(AttributeGroup $attribute_group)
    {
        $attributes = $this->attributeGroupRepository->attributes($attribute_group);
        return view('admins.attribute_groups.show', ['group' => $attribute_group, 'attributes' => $attributes]);
    }

    public function edit(AttributeGroup $attribute_group)
    {
        return view('admins.attribute_groups.edit', ['group' => $attribute_group]);
    }

    public function update(AttributeGroupUpdateRequest $request, AttributeGroup $attribute_group)
    {
        $attributeGroup = $attribute_group;
        if (
            $request->input('position') === $attributeGroup->getPosition() ||
            ($request->input('position') !== $attributeGroup->getPosition() && $this->attributeGroupRepository->findByPosition($request->input('position')) === null)
        ) {
            try {
                $this->attributeGroupRepository->update($request->only(['name', 'type', 'position']), $attributeGroup->id);
                return redirect()->route('admins.attribute-groups.index')->with('success', 'گروه ترکیبات ویرایش شد.');
            } catch (\Exception $ex) {
                return redirect()->back()->with('fail', $ex->getMessage());
            }
        } else {
            try {
                $this->attributeGroupRepository->updateAndSwapPosition($attributeGroup, $request->only(['name', 'type', 'position']));
                return redirect()->route('admins.attribute-groups.index')->with('success', 'گروه ترکیبات ویرایش شد.');
            } catch (\Exception $ex) {
                return redirect()->back()->with('fail', $ex->getMessage());
            }
        }
    }

    public function destroy(AttributeGroup $attribute_group)
    {
        try {
            $this->attributeGroupRepository->delete($attribute_group->id);
            return redirect()->route('admins.attribute-groups.index')->with('success', 'گروه ترکیبات حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function addAttribute(AttributeGroup $attributeGroup)
    {
        return view('admins.attribute_groups.add_attribute', ['group' => $attributeGroup]);
    }

    public function storeAttribute(AttributeStoreRequest $request, AttributeGroup $attributeGroup)
    {
        $request->merge(['attribute_group_id' => $attributeGroup->id]);
        if ($attributeGroup->isDropdown()) {
            $request->merge(['color' => null]);
        } else {
            $request->validate(['color' => 'required|regex:/#[a-fA-F0-9]{6}/']);
        }
        try {
            $this->attributeRepository->create($request->only(['value', 'attribute_group_id', 'color']));
            return redirect()->route('admins.attribute-groups.show', $attributeGroup->id)->with('success', 'مقدار اضافه شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
